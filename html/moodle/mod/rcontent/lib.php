<?php

global $RCONTENT_WINDOW_OPTIONS; // must be global because it might be included from a function!
$RCONTENT_WINDOW_OPTIONS = array('resizable', 'scrollbars', 'directories', 'location',
                                 'menubar', 'toolbar', 'status', 'width', 'height');

/**
 * Add new instance
 * @param object $data -> POST values
 * @return int/bool -> if ok return last insert id else return false
 */
function rcontent_add_instance($data){
 if(empty($data))
     return false;

 //resizable=1,scrollbars=1,directories=1,location=1,menubar=1,toolbar=1,status=1,height=450,width=620
 $popup_options = array();
 if(isset($data->resizable))   $popup_options[]="resizable=".$data->resizable;
 if(isset($data->scrollbars))  $popup_options[]="scrollbars=".$data->scrollbars;
 if(isset($data->directories)) $popup_options[]="directories=".$data->directories;
 if(isset($data->location))    $popup_options[]="location=".$data->location;
 if(isset($data->menubar))     $popup_options[]="menubar=".$data->menubar;
 if(isset($data->toolbar))     $popup_options[]="toolbar=".$data->toolbar;
 if(isset($data->status))      $popup_options[]="status=".$data->status;
 if(isset($data->height))      $popup_options[]="height=".$data->height;
 if(isset($data->width))       $popup_options[]="width=".$data->width;
    
 $popup_options = implode(",",$popup_options);
 
 $tmp = new stdClass();
 $tmp->course        = $data->course;
 $tmp->name          = $data->name;
 $tmp->summary       = $data->summary;
 $tmp->levelid       = (isset($data->levelid))?$data->levelid:required_param('level',PARAM_INT);
 $tmp->bookid        = (isset($data->isbn))?$data->isbn:required_param('isbn',PARAM_INT);
 $tmp->unitid        = (isset($data->unit))?$data->unit:required_param('unit',PARAM_INT);
 $tmp->activityid    = (isset($data->activity))?$data->activity:required_param('activity',PARAM_INT);
 $tmp->whatgrade     = $data->whatgrade;
 $tmp->popup         = $data->windowpopup;
 $tmp->popup_options = $popup_options;
 $tmp->frame         = $data->framepage;
//MARSUPIAL ********** AFEGIT -> Bug no save frame size
//2011.06.17 @mmartinez
 $tmp->width         = $data->width;
 $tmp->height        = $data->height;
//********** FI
 $tmp->timecreated   = time();
 $tmp->timemodified  = time();
 
 $id=insert_record("rcontent",$tmp);
 
 if ($id!==false){
 	$tmp->id=$id;
 	rcontent_grade_item_update(stripslashes_recursive($tmp));
 }
 return $id; 
    
}

/**
 * Update an instance
 * @param object $data -> POST values
 * @return bool -> if ok true else false
 */
function rcontent_update_instance($data){
   if(empty($data))
       return false; 
 
    $popup_options = array();
    if(isset($data->resizable))   $popup_options[]="resizable=".$data->resizable;
    if(isset($data->scrollbars))  $popup_options[]="scrollbars=".$data->scrollbars;
    if(isset($data->directories)) $popup_options[]="directories=".$data->directories;
    if(isset($data->location))    $popup_options[]="location=".$data->location;
    if(isset($data->menubar))     $popup_options[]="menubar=".$data->menubar;
    if(isset($data->toolbar))     $popup_options[]="toolbar=".$data->toolbar;
    if(isset($data->status))      $popup_options[]="status=".$data->status;
    if(isset($data->height))      $popup_options[]="height=".$data->height;
    if(isset($data->width))       $popup_options[]="width=".$data->width;
    
    $popup_options = implode(",",$popup_options);
 
    $tmp = new stdClass();
    $tmp->id            = $data->instance;
    $tmp->course        = $data->course;
    $tmp->name          = $data->name;
    $tmp->summary       = $data->summary;
    $tmp->levelid       = (isset($data->levelid))?$data->levelid:required_param('level',PARAM_INT);
    $tmp->bookid        = (isset($data->isbn))?$data->isbn:required_param('isbn',PARAM_INT);
    $tmp->unitid        = (isset($data->unit))?$data->unit:required_param('unit',PARAM_INT);
    $tmp->activityid    = (isset($data->activity))?$data->activity:required_param('activity',PARAM_INT);
    $tmp->whatgrade     = $data->whatgrade;
    $tmp->popup         = $data->windowpopup;
    $tmp->popup_options = $popup_options;
    $tmp->frame         = $data->framepage;
//MARSUPIAL ********** AFEGIT -> Bug no save frame size
//2011.06.17 @mmartinez
    $tmp->width         = $data->width;
    $tmp->height        = $data->height;
//********** FI
    $tmp->timemodified  = time();
    $tmp->timecreated   = time();
 
    if ($result = update_record("rcontent",$tmp)) {
        rcontent_grade_item_update(stripslashes_recursive($tmp));
    }
 
 return $result; 
   
}
/**
 * Delete an instance
 * @param int $id -> rcontent id
 * @return bool -> if ok true else false
 */
function rcontent_delete_instance($id){
    
    if (($data = get_record('rcontent', 'id', $id)) === false) {
        return false;
    }
    
    if ((delete_records('rcontent', 'id', $data->id)) === false) {
        return false;
    }
    
    if(delete_records('rcontent_grades','rcontentid',$data->id)===false){
    	return false;
    }
    
    if(delete_records('rcontent_grades_details','rcontentid',$data->id)===false){
    	return false;
    }
    
    rcontent_grade_item_delete(stripslashes_recursive($data));
    
    return true;
}

function rcontent_user_outline(){
    return true;
}

function rcontent_user_complete($course, $user, $mod, $rcontet){
    return true;    
}

function rcontent_print_recent_activity($course,$isteacher,$timestart){
	return true;
}

function rcontent_cron(){
	return true;
}

function rcontent_install(){
	/*borrar wsdl*/
	global $CFG;
	if (is_file("$CFG->dataroot/1/WebServices/WsSeguimiento/wsSeguimiento.wsdl")){
		if (!unlink("$CFG->dataroot/1/WebServices/WsSeguimiento/wsSeguimiento.wsdl")){
			return false;
		}		
	}
    return true;    
}

function rcontent_uninstall(){
	/*borrar wsdl*/
	global $CFG;
	if (is_file("$CFG->dataroot/1/WebServices/WsSeguimiento/wsSeguimiento.wsdl")){
		if (!unlink("$CFG->dataroot/1/WebServices/WsSeguimiento/wsSeguimiento.wsdl")){
			return false;
		}		
	}
    return true;    
}

/**
 * Update/create grade item for given rcontent
 * @param object $rcontent object with extra cmidnumber
 * @param mixed optional array/object of grade(s); 'reset' means reset grades in gradebook
 * @return object grade_item
 */
function rcontent_grade_item_update($rcontent, $grades=NULL) {
    global $CFG;
    if (!function_exists('grade_update')) { //workaround for buggy PHP versions
        require_once($CFG->libdir.'/gradelib.php');
    }

    $params = array('itemname'=>$rcontent->name);
    if (isset($rcontent->cmidnumber)) {
        $params['idnumber'] = $rcontent->cmidnumber;
    }
    if ($maxgrade = get_records('rcontent_grades','rcontentid', $rcontent->id)) {
    	$rsmaxgrade=array_values($maxgrade);
    	$rsmaxgrade=$rsmaxgrade[0];
        $params['gradetype'] = GRADE_TYPE_VALUE;
        $params['grademax']  = ($rsmaxgrade->maxgrade!='')?$rsmaxgrade->maxgrade:100;
        $params['grademin']  = ($rsmaxgrade->mingrade!='')?$rsmaxgrade->mingrade:0;
        //echo "<br><br>rsmaxgrade: "; print_r($rsmaxgrade); echo "<br><br>"; //debug mode
    } else {
        $params['gradetype'] = GRADE_TYPE_VALUE;
    }

    if ($grades  === 'reset') {
        $params['reset'] = true;
        $grades = NULL;
    }
    //echo "<br><br>grade_update('mod/rcontent', $rcontent->course, 'mod', 'rcontent', $rcontent->id, 0, $grades, $params);<br>Array1: ";  //debug mode
    //print_r($grades);  //debug mode
    //echo "<br>Array2: ";  //debug mode
    //print_r($params);  //debug mode
    return grade_update('mod/rcontent', $rcontent->course, 'mod', 'rcontent', $rcontent->id, 0, $grades, $params);
}

/**
 * Delete grade item for given rcontent
 * @param object $rcontent object
 * @return object grade_item
 */
function rcontent_grade_item_delete($rcontent) {
    global $CFG;
    require_once($CFG->libdir.'/gradelib.php');

    return grade_update('mod/rcontent', $rcontent->course, 'mod', 'rcontent', $rcontent->id, 0, NULL, array('deleted'=>1));
}

/**
 * Return grade for given user or all users.
 * @param int $rcontentid id of rcontent
 * @param int $userid optional user id, 0 means all users
 * @return array array of grades, false if none
 */
function rcontent_get_user_grades($rcontent, $userid=0) {
    global $CFG;
    require_once('locallib.php');

    $grades = array();
    if (empty($userid)) {
        if ($rcontentusers = get_records_select('rcontent_grades', "rcontentid='$rcontent->id' AND unitid=$rcontent->unitid AND activityid=$rcontent->activityid GROUP BY userid", "", "userid")) {
            foreach ($rcontentusers as $rcontentuser) {
                $grades[$rcontentuser->userid] = new object();
                $grades[$rcontentuser->userid]->id         = $rcontentuser->userid;
                $grades[$rcontentuser->userid]->userid     = $rcontentuser->userid;
                $grades[$rcontentuser->userid]->rawgrade   = rcontent_grade_user($rcontent, $rcontentuser->userid, 'gradebook');
                $grades[$rcontentuser->userid]->feedback   = rcontent_grade_user_comments($rcontent,$rcontentuser->userid);
            }
        } else {
            return false;
        }

    } else {
        if (!$rcontentuser=get_records_select('rcontent_grades', "rcontentid='$rcontent->id' AND userid='$userid' AND unitid=$rcontent->unitid AND activityid=$rcontent->activityid GROUP BY userid", "", "userid")) {
            return false; //no attempt yet
        }
        $rcontentuser=array_values($rcontentuser);
        $rcontentuser=$rcontentuser[0];
        $grades[$userid] = new object();
        $grades[$userid]->id         = $userid;
        $grades[$userid]->userid     = $userid;
        $grades[$userid]->rawgrade   = rcontent_grade_user($rcontent, $userid, 'gradebook');
        $grades[$userid]->feedback   = rcontent_grade_user_comments($rcontent,$rcontentuser->userid);
    }

    return $grades;
}
/**
 * Update grades in central gradebook
 * @param object $rcontent null means all rcontentbases
 * @param int $userid specific user only, 0 mean all
 */
function rcontent_update_grades($rcontent=null, $userid=0, $nullifnone=true) {
    global $CFG;
    if (!function_exists('grade_update')) { //workaround for buggy PHP versions
        require_once($CFG->libdir.'/gradelib.php');
    }

    if ($rcontent != null) {
        if ($grades = rcontent_get_user_grades($rcontent, $userid)) {
            rcontent_grade_item_update($rcontent, $grades);

        } else if ($userid and $nullifnone) {
            $grade = new object();
            $grade->userid   = $userid;
            $grade->rawgrade = NULL;
            rcontent_grade_item_update($rcontent, $grade);

        } else {
            rcontent_grade_item_update($rcontent);
        }

    } else {
        $sql = "SELECT s.*, cm.idnumber as cmidnumber
                  FROM {$CFG->prefix}rcontent s, {$CFG->prefix}course_modules cm, {$CFG->prefix}modules m
                 WHERE m.name='rcontent' AND m.id=cm.module AND cm.instance=s.id";
        if ($rs = get_recordset_sql($sql)) {
            while ($rcontent = rs_fetch_next_record($rs)) {
                rcontent_update_grades($rcontent, 0, false);
            }
            rs_close($rs);
        }
    }
}

?>
