<?php
/**
 * Formicula - the contact mailer for Zikula
 * -----------------------------------------
 *
 * @copyright  (c) Formicula Development Team
 * @link       http://code.zikula.org/formicula
 * @version    $Id: pnuserapi.php 164 2009-11-10 19:15:19Z herr.vorragend $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Frank Schummertz <frank@zikula.org>
 * @package    Third_Party_Components
 * @subpackage formicula
 */

/**
 * getContact
 * reads a single contact by id
 *
 *@param cid int contact id
 *@param form int form id
 *@returns array with contact information
 */
function formicula_userapi_getContact($args)
{
    $dom = ZLanguage::getModuleDomain('formicula');
    if (!isset($args['cid']) || !is_numeric($args['cid'])) {
        return LogUtil::registerArgsError();
    }
    if (!isset($args['form']) || !is_numeric($args['form'])) {
        $args['form'] = 0;
    }

    if(!SecurityUtil::checkPermission('formicula::', $args['form'] . ':' . $args['cid'] . ':', ACCESS_COMMENT)) {
        return LogUtil::registerPermissionError();
    }

    $contact = DBUtil::selectObjectByID('formcontacts', $args['cid'], 'cid');
    return $contact;
}

/**
 * readValidContacts
 * reads the contact list and returns it as array.
 * This function filters out the entries the user is not allowed to see
 *
 *@param form int form id
 *@returns array with contact information
 */
function formicula_userapi_readValidContacts($args)
{
    $dom = ZLanguage::getModuleDomain('formicula');
    extract($args);

    $allcontacts = pnModAPIFunc('formicula', 'admin', 'readContacts');
    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($allcontacts == false) {
        return LogUtil::registerError(__('Error! Could not load items.', $dom));
    }

    // Put items into result array.  Note that each item is checked
    // individually to ensure that the user is allowed access to it before it
    // is added to the results array
    $validcontacts = array();
    foreach($allcontacts as $contact) {
        if (SecurityUtil::checkPermission('formicula::', $args['form'] . ':.*:', ACCESS_COMMENT)) {
            $validcontacts[] = $contact;
        }
    }

    // Return the contacts
    return $validcontacts;
}

/**
 * sendtoContact
 * sends the mail to the contact
 *
 *@param userdata array with user submitted data
 *@param contact array of contact information (single contact)
 *@param custom array of custom fields information
 *@param form int form id
 *@param format   string email format, either 'plain' or 'html'
 *@returns boolean
 */
function formicula_userapi_sendtoContact($args)
{
    $userdata = $args['userdata'];
    $contact  = $args['contact'];
    $custom   = $args['custom'];
    $form     = DataUtil::formatForOS($args['form']);
    $format   = $args['format'];

    if(pnModAvailable('Mailer')) {
        $pnr = pnRender::getInstance('formicula', false, null, true);
        $ip = getenv('REMOTE_ADDR');
        $pnr->assign('host', gethostbyaddr($ip));
        $pnr->assign('ip', $ip);
        $pnr->assign('form', $form);
        $pnr->assign('contact', $contact);
        $pnr->assign('userdata', $userdata);

        $sitename = pnConfigGetVar('sitename');
        $pnr->assign('sitename', $sitename);

        // attach all files we have got
        $attachments = array();
        $uploaddir = pnModGetVar('formicula', 'upload_dir');
        for($i=0;$i<count($custom);$i++) {
            if(is_array($custom[$i]['data']))  {
                $attachments[] = $uploaddir."/".$custom[$i]['data']['name'];
                $custom[$i]['data'] = $custom[$i]['data']['name'];
            }
        }
        $pnr->assign('custom', $custom);

        switch($format) {
            case 'html' :
                    $body = $pnr->fetch($form."_adminmail.html");
                    $html = true;
                    break;
            default:
                    $body = $pnr->fetch($form."_adminmail.txt");
                    $html = false;
        }

        $res = pnModAPIFunc('Mailer', 'user', 'sendmessage',
                             array('fromname'    => $userdata['uname'],
                                    'fromaddress' => $userdata['uemail'],
                                    'toname'      => $contact['mail'],
                                    'toaddress'   => $contact['email'],
                                    'subject'     => $sitename." - ".$contact['name'],
                                    'body'        => $body,
                                    'attachments' => $attachments,
                                    'html'        => $html));

        if(pnModGetVar('formicula', 'delete_file') == 1) {
            foreach($attachments as $attachment) {
                unlink($attachment);
            }
        }

        return $res;

    }
    // no mailer module - error!
    return false;
}

/**
 * sendtoUser
 * sends the confirmation mail to the user
 *
 *@param userdata array with user submitted data
 *@param contact  array with contact data
 *@param custom   array of custom fields information
 *@param form     int form id
 *@param format   string email format, either 'plain' or 'html'
 *@returns boolean
 */
function formicula_userapi_sendtoUser($args)
{
    $dom = ZLanguage::getModuleDomain('formicula');
    $userdata = $args['userdata'];
    $contact  = $args['contact'];
    $custom   = $args['custom'];
    $form     = DataUtil::formatForOS($args['form']);
    $format   = $args['format'];

    if(pnModAvailable('Mailer')) {
        $pnr = pnRender::getInstance('formicula', false, null, true);
        $ip = getenv('REMOTE_ADDR');
        $pnr->assign('host', gethostbyaddr($ip));
        $pnr->assign('ip', $ip);
        $pnr->assign('form', $form);
        $pnr->assign('contact', $contact);
        $pnr->assign('userdata', $userdata);

        $sitename = pnConfigGetVar('sitename');
        $pnr->assign('sitename', $sitename);

        $pnr->assign('custom', pnModAPIFunc('formicula', 'user', 'removeUploadInformation', array('custom' => $custom)));

        switch($format) {
            case 'html' :
                    $body = $pnr->fetch($form."_usermail.html");
                    $html = true;
                    break;
            default:
                    $body = $pnr->fetch($form."_usermail.txt");
                    $html = false;
        }

        // check for sender name
        if(!empty($contact['sname'])) {
            $fromname = $contact['sname'];
        } else {
            $fromname = $sitename . ' - ' . DataUtil::formatForDisplay(__('Contact Form', $dom));
        }
        // check for sender email
        if(!empty($contact['semail'])) {
            $frommail = $contact['semail'];
        } else {
            $frommail = $contact['email'];
        }
        // check for subject
        if(!empty($contact['ssubject'])) {
            $subject = $contact['ssubject'];
            // replace some placeholders
            // %s = sitename
            // %l = slogan
            // %u = site url
            // %c = contact name
            // %n<num> = user defined field name <num>
            // %d<num> = user defined field data <num>
            $subject = str_replace('%s', DataUtil::formatForDisplay($sitename), $subject);
            $subject = str_replace('%l', DataUtil::formatForDisplay(pnConfigGetVar('slogan')), $subject);
            $subject = str_replace('%u', pnGetBaseURL(), $subject);
            $subject = str_replace('%c', DataUtil::formatForDisplay($contact['sname']), $subject);
            foreach($custom as $num => $customdata) {
                $subject = str_replace('%n' . $num, $customdata['name'], $subject);
                $subject = str_replace('%d' . $num, $customdata['data'], $subject);
            }
        } else {
            $subject = $sitename." - ".$contact['name'];
        }

        return pnModAPIFunc('Mailer', 'user', 'sendmessage',
                            array('fromname'    => $fromname,
                                  'fromaddress' => $frommail,
                                  'toname'      => $userdata['uname'],
                                  'toaddress'   => $userdata['uemail'],
                                  'subject'     => $subject,
                                  'body'        => $body,
                                  'html'        => $html));


    }
    // no mailer module - error!
    return false;
}

/**
 * checkArguments
 * checks if mandatory arguments are correct
 *@param userdata array with user submitted data, we are interested in uemail, uname and comment here
 *@param custom array with custom data
 *@param userformat string format of users email for relaxed checking if userformat=none
 *@returns boolean
 */
function formicula_userapi_checkArguments($args)
{
    $dom = ZLanguage::getModuleDomain('formicula');
    $userdata   = $args['userdata'];
    $custom     = $args['custom'];
    $userformat = $args['userformat'];

    $ok = true;

    if ($userformat <> 'none') {
        if (!isset($userdata['uemail']) || (pnVarValidate($userdata['uemail'], 'email') == false)) {
            $ok = LogUtil::registerError(__('Error! No or incorrect E-Mail address supplied', $dom));
        }

        if (!isset($userdata['uname']) || empty($userdata['uname']) || ($userdata['uname'] != pnVarCensor($userdata['uname']))) {
            $ok = LogUtil::registerError(__('Error! No username given', $dom));
        }
    }

    if ($userdata['comment'] != pnVarCensor($userdata['comment'])) {
        $ok = LogUtil::registerError(__('Error! No or invalid comment supplied (no HTML!)', $dom));
    }

    foreach($custom as $field) {
        if($field['mandatory'] == true) {
            if(!is_array($field['data']) && (empty($field['data']))) {
                $ok = LogUtil::registerError(__('Error! Mandatory field:' . DataUtil::formatForDisplay($field['name'])));
            }
            if(($field['upload'] == true) && ($field['data']['size'] == 0)) {
                $ok = LogUtil::registerError(__('Error! Upload error', $dom));
            }
        }
    }
    return $ok;
}

/**
 * removeUploadInformation
 * replaces the information about uploaded files with the filename so that we can use it in the
 * templates
 *
 *@param custom array of custom fields
 *@return cleaned custom array
 */
function formicula_userapi_removeUploadInformation($args)
{
    if(isset($args['custom']) && is_array($args['custom'])) {
        $custom = $args['custom'];
        for($i=0;$i<count($custom);$i++) {
            if($custom[$i]['upload'] == true) {
                $custom[$i]['data'] = $custom[$i]['data']['name'];
            }
        }
    } else {
        $custom = array();
    }
    return $custom;
}
