<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: stories.php 9 2008-11-05 21:42:16Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Stats
 */

/**
 * obtain the number of registered users
 *
 */
function stats_pluginapi_stories()
{
    // Security check
    if (!SecurityUtil::checkPermission('Stats::', '::', ACCESS_READ)) {
        return LogUtil::registerError (__('Sorry! No authorization to access this module.', $dom));
    }

    // check the module availability
    if (!pnModAvailable('News')) {
        return false;
    }

    $count = pnModAPIFunc('News', 'user', 'countitems', array('status' => 0));

    // create the output object
    $pnRender = pnRender::getInstance('Stats');

    // assign the result set
    $pnRender->assign(array('image' => 'news.gif', 'string' => __('News stories published:', $dom), 'value' => $count));

    // return the result set
    return $pnRender->fetch('stats_plugin.htm');
}
