<?php
class Files_Controller_External extends Zikula_AbstractController
{
    public function postInitialize()
    {
        $this->view->setCaching(false);
    }
    /**
     * List the files in server folder
     * @author: Albert Pérez Monfort
     * @param:  args   the folder name where to list the files and subfolders
     * @return: The list of files and folders
     */
    public function getFiles($args)
    {
        $hook = FormUtil::getPassedValue('hook', isset($args['hook']) ? $args['hook'] : 0, 'GET');
        PageUtil::AddVar('javascript', 'modules/Files/javascript/getFiles.js');
        // get arguments
        $folder = FormUtil::getPassedValue('folder', isset($args['folder']) ? $args['folder'] : null, 'REQUEST');
        $folder = str_replace("|", "/", $folder);
        // security check
        if (!SecurityUtil::checkPermission( 'Files::', '::', ACCESS_ADD) || !UserUtil::isLoggedIn()) {
            $errorMsg = $this->__('Sorry! You have not been granted access to this page.');
            $this->view->assign('errorMsg', $errorMsg);
            $this->view->assign('external', 1);
            $this->view->display('Files_user_errorMsg.tpl');
            exit;
        }
        $oFolder = $folder;
        // gets root folder for the user
        $initFolderPath = ModUtil::func('Files', 'user', 'getInitFolderPath');
        // check if the root folder exists
        if(!file_exists($initFolderPath)){
            $errorMsg = $this->__('The server directory does not exist. Contact with the website administrator to solve this problem.');
            $this->view->assign('errorMsg',  $errorMsg);
            $this->view->assign('external', 1);
            $this->view->display('Files_user_errorMsg.tpl');
            exit;
        }
        // protection. User can not navigate out their root folder
        if($folder == ".." || $folder == "."){
            $errorMsg = $this->__('Invalid folder') . ': ' . $folder;
            $this->view->assign('errorMsg', $errorMsg);
            $this->view->assign('external', 1);
            $this->view->display('Files_user_errorMsg.tpl');
            exit;
        }
        // get folder name
        $folderName = str_replace($initFolderPath . '/' , '', $folder);
        $folder = $initFolderPath . '/' .  $folder;
        // users can not browser the thumbnails folders
        if(strpos($folder, '.tbn') !== false) {
            LogUtil::registerError($this->__('It is not possible to browse this folder'));
            return System::redirect(ModUtil::url('Files', 'external', 'getFiles',
                                                  array('folder' => substr($folderName, 0, strrpos($folderName, '/')))));
        }
        // needed arguments
        // check if the folder exists
        if(!file_exists($folder)){
            $errorMsg = $this->__('Invalid folder').': '.$folderName;
            $this->view->assign('errorMsg',  $errorMsg);
            $this->view->assign('external', 1);
            $this->view->display('Files_user_errorMsg.tpl');
            exit;
        }
        // get user's disk use
        $userDiskUse = ModUtil::apiFunc('Files', 'user', 'get');
        $usedSpace = $userDiskUse['diskUse'];
        // get user's allowed space
        $userAllowedSpace = ModUtil::func('Files', 'user', 'getUserQuota');
        $maxDiskSpace = round($userAllowedSpace * 1024 * 1024);
        $percentage = round($usedSpace * 100 / $maxDiskSpace);
        $widthUsage = ($percentage > 100) ? 100 : $percentage;
        $usedSpaceArray = array('maxDiskSpace' => ModUtil::func('Files', 'user', 'diskUseFormat',
                                                                 array('value' => $maxDiskSpace)),
                                                                       'percentage' => $percentage,
                                'usedDiskSpace' => ModUtil::func('Files', 'user', 'diskUseFormat',
                                                                  array('value' => $usedSpace)),
                                                                        'widthUsage' => $widthUsage);
        // create output object
        $this->view = Zikula_View::getInstance('Files', false);
        // get folder files and subfolders
        $fileList = ModUtil::func('Files', 'user', 'dir_list',
                                   array('folder' => $folder,
                                         'external' => 1,
                                         'hook' => $hook));
        sort($fileList['dir']);
        sort($fileList['file']);
        $notwriteable = (!is_writable($folder)) ? true : false;
        // check if it is a public directori
        $is_public = (!file_exists($folder.'/.locked')) ? true : false ;
        $this->view->assign('publicFolder',  $is_public);
        $this->view->assign('folderPrev', substr($folderName, 0 ,  strrpos($folderName, '/')));
        $folderPath = (SecurityUtil::checkPermission( 'Files::', '::', ACCESS_ADMIN)) ? $folderName : ModUtil::getVar('Files', 'usersFolder') . '/' . strtolower(substr(UserUtil::getVar('uname'), 0 , 1)) . '/' . UserUtil::getVar('uname') . '/' .$folderName;
        $imagesArray = array();
        // get folder files and subfolders
        if(file_exists($folder . '/.tbn')) {
            $images = ModUtil::func('Files', 'user', 'dir_list',
                                array('folder' => $folder . '/.tbn',
                                      'external' => 1));
            foreach($images['file'] as $file) {
                $fileExtension = FileUtil::getExtension($file['name']);
                if(in_array(strtolower($fileExtension), array('gif','png','jpg'))) {
                    list($width, $height) = getimagesize($folder . '/' . $file['name']);
                    list($newWidth, $newHeight) = getimagesize($folder . '/.tbn/' . $file['name']);
                    $factor = round($width/$newWidth,2);
                    $imagesArray[] = array('name' => $file['name'],
                                        'viewWidth' => $newWidth,
                                        'width' => $width,
                                        'viewHeight' => $newHeight,
                                        'height' => $height,
                                        'factor' => $factor);
                }
            }
        }
        $this->view->assign('folderPath', DataUtil::formatForDisplay($folderPath));
        $this->view->assign('folderName', DataUtil::formatForDisplay($folderName));
        $this->view->assign('fileList', $fileList);
        $this->view->assign('hook', $hook);
        $this->view->assign('imagesArray', DataUtil::formatForDisplay($imagesArray));
        $this->view->assign('usedSpace',  $usedSpaceArray);
        $this->view->assign('notwriteable', $notwriteable);
        return $this->view->display('Files_external_getFiles.tpl');
    }
}