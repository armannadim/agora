<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadmin.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Admin_Messages
 * @license http://www.gnu.org/copyleft/gpl.html
 */

/**
 * the main administration function
 * This function is the default function, and is called whenever the
 * module is initiated without defining arguments.  As such it can
 * be used for a number of things, but most commonly it either just
 * shows the module menu and returns or calls whatever the module
 * designer feels should be the default function (often this is the
 * view() function)
 * @author Mark West
 * @return string HTML output string
 */
function Admin_Messages_admin_main()
{
    // Security check
    if (!SecurityUtil::checkPermission('Admin_Messages::', '::', ACCESS_EDIT)) {
        return LogUtil::registerPermissionError ();
    }

    // Create output object
    $pnRender = & pnRender::getInstance('Admin_Messages', false);

    // Return the output that has been generated by this function
    return $pnRender->fetch('admin_messages_admin_main.htm');
}

/**
 * add a new admin message
 * This is a standard function that is called whenever an administrator
 * wishes to create a new module item
 * @author Mark West
 * @return string HTML output string
 */
function Admin_Messages_admin_new()
{
    // Security check
    if (!SecurityUtil::checkPermission('Admin_Messages::', '::', ACCESS_ADD)) {
        return LogUtil::registerPermissionError ();
    }

    // Create output object
    $pnRender = & pnRender::getInstance('Admin_Messages', false);

    // Assign the default language
    $pnRender->assign('language', ZLanguage::getLanguageCode());

    // Return the output that has been generated by this function
    return $pnRender->fetch('admin_messages_admin_new.htm');
}

/**
 * This is a standard function that is called with the results of the
 * form supplied by Admin_Messages_admin_new() to create a new item
 * @author Mark West
 * @see Admin_Messages_admin_new()
 * @param string $args['title'] the title of the admin message
 * @param string $args['content'] the text of the admin message
 * @param string $args['language'] the language of the admin message
 * @param int $args['active'] active status of the admin message
 * @param int $args['expire'] the expiry date of the message
 * @param int $args['view'] who can view the message
 * @return bool true if creation successful, false otherwiise
 */
function Admin_Messages_admin_create($args)
{
    $message = FormUtil::getPassedValue('message', isset($args['message']) ? $args['message'] : null, 'POST');

    // Confirm authorisation code.
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError();
    }

    // Notable by its absence there is no security check here.
    // Create the admin message
    $mid = pnModAPIFunc('Admin_Messages', 'admin', 'create',
                         array('title' => $message['title'],
                               'content' => $message['content'],
                               'language' => isset($message['language']) ? $message['language'] : '',
                               'active' => $message['active'],
                               'expire' => $message['expire'],
                               'view' => $message['view']));

    // The return value of the function is checked
    if ($mid != false) {
        // Success
        LogUtil::registerStatus(__('Done! Created administrator message.'));
    }

    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    return pnRedirect(pnModURL('Admin_Messages', 'admin', 'view'));
}

/**
 * modify an Admin Message
 * This is a standard function that is called whenever an administrator
 * wishes to modify a current module item
 * @author Mark West
 * @param int $args['mid'] the id of the admin message to modify
 * @param int $args['objectid'] generic object id maps to mid if present
 * @return string HTML output string
 */
function Admin_Messages_admin_modify($args)
{
    $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'GET');
    $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'GET');

    if (!empty($objectid)) {
        $mid = $objectid;
    }

    // Create output object
    $pnRender = & pnRender::getInstance('Admin_Messages', false);

    // Get the admin message
    $item = pnModAPIFunc('Admin_Messages', 'user', 'get', array('mid' => $mid));

    if ($item == false) {
        return LogUtil::registerError(__('Sorry! No such administrator message found.'), 404);
    }

    // Security check.
    if (!SecurityUtil::checkPermission('Admin_Messages::item', "$item[title]::$mid", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError ();
    }

    // Assign the item
    $pnRender->assign($item);

    // Return the output that has been generated by this function
    return $pnRender->fetch('admin_messages_admin_modify.htm');
}


/**
 * This is a standard function that is called with the results of the
 * form supplied by Admin_Messages_admin_modify() to update a current item
 * @author Mark West
 * @see Admin_Messages_admin_modify()
 * @param int $args['mid'] the id of the admin message to update
 * @param int $args['objectid'] generic object id maps to mid if present
 * @param string $args['title'] the title of the admin message
 * @param string $args['content'] the text of the admin message
 * @param string $args['language'] the language of the admin message
 * @param int $args['active'] active status of the admin message
 * @param int $args['expire'] the expiry date of the message
 * @param int $args['view'] who can view the message
 * @return bool true if successful, false otherwise
 */
function Admin_Messages_admin_update($args)
{
    $message = FormUtil::getPassedValue('message', isset($args['message']) ? $args['message'] : null, 'POST');
    if (!empty($message['objectid'])) {
        $message['mid'] = $message['objectid'];
    }

    // Confirm authorisation code.
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError();
    }

    // Notable by its absence there is no security check here.
    // Update the admin message
    if (pnModAPIFunc('Admin_Messages', 'admin', 'update',
                    array('mid' => $message['mid'],
                          'title' => $message['title'],
                          'content' => $message['content'],
                          'language' => isset($message['language']) ? $message['language'] : '',
                          'active' => $message['active'],
                          'expire' => $message['expire'],
                          'oldtime' => $message['oldtime'],
                          'changestartday' => $message['changestartday'],
                          'view' => $message['view']))) {
        // Success
        LogUtil::registerStatus(__('Done! Saved administrator message.'));
    }

    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    return pnRedirect(pnModURL('Admin_Messages', 'admin', 'view'));
}

/**
 * delete item
 * This is a standard function that is called whenever an administrator
 * wishes to delete a current module item.  Note that this function is
 * the equivalent of both of the modify() and update() functions above as
 * it both creates a form and processes its output.  This is fine for
 * simpler functions, but for more complex operations such as creation and
 * modification it is generally easier to separate them into separate
 * functions.  There is no requirement in the Zikula MDG to do one or the
 * other, so either or both can be used as seen appropriate by the module
 * developer
 * @author Mark West
 * @param int $args['mid'] the id of the admin message to delete
 * @param int $args['objectid'] generic object id maps to mid if present
 * @param bool $args['confirmation'] confirmation of the deletion
 * @return mixed HTML output string if no confirmation, true if succesful, false otherwise
 */
function Admin_Messages_admin_delete($args)
{
    $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'REQUEST');
    $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'REQUEST');
    $confirmation = FormUtil::getPassedValue('confirmation', null, 'POST');
     if (!empty($objectid)) {
         $mid = $objectid;
     }

    // Get the existing admin message
    $item = pnModAPIFunc('Admin_Messages', 'user', 'get', array('mid' => $mid));

    if ($item == false) {
        return LogUtil::registerError(__('Sorry! No such administrator message found.'), 404);
    }

    // Security check
    if (!SecurityUtil::checkPermission('Admin_Messages::', "$item[title]::$mid", ACCESS_DELETE)) {
        return LogUtil::registerPermissionError ();
    }

    // Check for confirmation.
    if (empty($confirmation)) {
        // No confirmation yet
        // Create output object
        $pnRender = & pnRender::getInstance('Admin_Messages', false);

        // Add the message id
        $pnRender->assign('mid', $mid);

        // Return the output that has been generated by this function
        return $pnRender->fetch('admin_messages_admin_delete.htm');
    }

    // If we get here it means that the user has confirmed the action

    // Confirm authorisation code.
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('Admin_Messages', 'admin', 'view'));
    }

    // Delete the admin message
    // The return value of the function is checked
    if (pnModAPIFunc('Admin_Messages', 'admin', 'delete',
                     array('mid' => $mid))) {
        // Success
        LogUtil::registerStatus(__('Done! Deleted administrator message.'));
    }

    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    return pnRedirect(pnModURL('Admin_Messages', 'admin', 'view'));
}

/**
 * view items
 * @author Mark West
 * @param int $startnum the start item id for the pager
 * @return string HTML output string
 */
function Admin_Messages_admin_view()
{
    // Security check
    if (!SecurityUtil::checkPermission('Admin_Messages::', '::', ACCESS_EDIT)) {
        return LogUtil::registerPermissionError ();
    }

    $startnum = FormUtil::getPassedValue('startnum', isset($args['startnum']) ? $args['startnum'] : null, 'GET');

    // Create output object
    $pnRender = & pnRender::getInstance('Admin_Messages', false);

    // The user API function is called.  This takes the number of items
    // required and the first number in the list of all items, which we
    // obtained from the input and gets us the information on the appropriate
    // items.
    $items = pnModAPIFunc('Admin_Messages', 'user', 'getall',
                           array('startnum' => $startnum,
                                 'numitems' => pnModGetVar('Admin_Messages', 'itemsperpage')));

    if (!$items)
        $items = array();

    $rows = array();
    foreach ($items as $item) {

        if (SecurityUtil::checkPermission('Admin_Messages::', "$item[title]::$item[mid]", ACCESS_READ)) {

            $fullitem = pnModAPIFunc('Admin_Messages', 'user', 'get',
                                      array('mid' => $item['mid']));

            if ($fullitem['language'] == '') {
                $fullitem['language'] = __('All');
            }

            $row[] = $fullitem['language'];

            if (!isset($fullitem['view'])) $fullitem['view'] = __('All visitors');
            switch ($fullitem['view']) {
                case '1':
                    $fullitem['view'] = __('All visitors');
                    break;
                case '2':
                    $fullitem['view'] = __('Registered users only');
                    break;
                case '3':
                    $fullitem['view'] = __('Anonymous guests only');
                    break;
                case '4':
                    $fullitem['view'] = __('Administrators only');
                    break;
            }
            $row[] = $fullitem['view'];

            if ($fullitem['active'] == 1) {
                $active = __('Yes');
            } else {
                $active = __('No');
            }

            if ($fullitem['expire'] == 0) {
                $expire = __('Never');
            } else if ($fullitem['expire']/86400 == 1) {
                $expire = $fullitem['expire']/86400 . ' ' . __('day');
            } else {
                $expire = $fullitem['expire']/86400 . ' ' . __('days');
            }

            if ($fullitem['expire'] == 0) {
                $expiredate = __('No expiration date');
            } else {
                $expiredate = ml_ftime(__('%b %d, %Y - %I:%M %p'), $fullitem['date'] + $fullitem['expire']);
            }

            // Options for the item.  Note that each item has the appropriate
            // levels of authentication checked to ensure that it is suitable
            // for display
            $options = array();
            if (SecurityUtil::checkPermission('Admin_Messages::', "$item[title]::$item[mid]", ACCESS_EDIT)) {
                $options[] = array('url' => pnModURL('Admin_Messages', 'admin', 'modify', array('mid' => $item['mid'])),
                                   'image' => 'xedit.gif',
                                   'title' => __('Edit'));
                if (SecurityUtil::checkPermission('Admin_Messages::', "$item[title]::$item[mid]", ACCESS_DELETE)) {
                    $options[] = array('url' => pnModURL('Admin_Messages', 'admin', 'delete', array('mid' => $item['mid'])),
                                       'image' => '14_layer_deletelayer.gif',
                                       'title' => __('Delete'));
                }
            }
            $rows[] = array( 'mid' => $item['mid'],
                             'title' => $item['title'],
                             'language' => $fullitem['language'],
                             'view' => $fullitem['view'],
                             'active' => $active,
                             'expire' => $expire,
                             'expiredate' => $expiredate,
                             'options' => $options);

        }
    }
    $pnRender->assign('items', $rows);

    // Assign the information required to create the pager
    $pnRender->assign('pager', array('numitems' => pnModAPIFunc('Admin_Messages', 'user', 'countitems'),
                                     'itemsperpage' => pnModGetVar('Admin_Messages', 'itemsperpage')));

    // Return the output that has been generated by this function
    return $pnRender->fetch('admin_messages_admin_view.htm');
}

/**
 * This is a standard function to modify the configuration parameters of the
 * module
 * @author Mark West
 * @return string HTML output string
 */
function Admin_Messages_admin_modifyconfig()
{
    // Security check
    if (!SecurityUtil::checkPermission('Admin_Messages::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError ();
    }

    // Create output object
    $pnRender = & pnRender::getInstance('Admin_Messages', false);

    // Number of items to display per page
    $pnRender->assign(pnModGetVar('Admin_Messages'));

    // Return the output that has been generated by this function
    return $pnRender->fetch('admin_messages_admin_modifyconfig.htm');
}

/**
 * This is a standard function to update the configuration parameters of the
 * module given the information passed back by the modification form
 * @author Mark West
 * @see Admin_Messages_admin_modifyconfig()
 * @param int $itemsperpage the number messages per page in the admin panel
 * @return bool true if successful, false otherwise
 */
function Admin_Messages_admin_updateconfig()
{
    // Security check
    if (!SecurityUtil::checkPermission('Admin_Messages::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError ();
    }

    // Confirm authorisation code.
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('Admin_Messages', 'admin', 'view'));
    }

    // Update module variables.
    $itemsperpage = (int)FormUtil::getPassedValue('itemsperpage', 25, 'POST');
    if ($itemsperpage < 1) $itemsperpage = 25;
    pnModSetVar('Admin_Messages', 'itemsperpage', $itemsperpage);

    $allowsearchinactive = (bool)FormUtil::getPassedValue('allowsearchinactive', false, 'POST');
    pnModSetVar('Admin_Messages', 'allowsearchinactive', $allowsearchinactive);

    // Let any other modules know that the modules configuration has been updated
    pnModCallHooks('module','updateconfig','Admin_Messages', array('module' => 'Admin_Messages'));

    // the module configuration has been updated successfuly
    LogUtil::registerStatus(__('Done! Saved module configuration.'));

    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    return pnRedirect(pnModURL('Admin_Messages', 'admin', 'view'));
}
