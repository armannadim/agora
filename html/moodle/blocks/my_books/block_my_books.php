<?php 
// MARSUPIAL ************* ADDED -> block my_books


class block_my_books extends block_list {

    function init() {
        $this->title = get_string('my_books', 'blocks/my_books');
        $this->version = 2012090591;
    }
    
    function instance_allow_multiple() {
        return false;
    }
    
    function has_config() {
        return true;
    }
    
	function applicable_formats() {
	    return array('site-index' => true);
	}

    function get_content() {
    	
    	global $CFG, $USER;
    	
        if (empty($USER->id) || isguest()) {
            return $this->content;
        }
    	
	    //if the content is already computed, do not compute it again
	    if ($this->content !== NULL) {
	        return $this->content;
	    }
    	
    	$this->content = new stdClass;
    	$this->content->items = array();
        $this->content->icons = array();
        $this->content->footer = '';
        
        /// load user books
        $sql = "SELECT * FROM {$CFG->prefix}rcommon_user_credentials RUC
            INNER JOIN {$CFG->prefix}rcommon_books RB ON RB.isbn = RUC.isbn
            WHERE RUC.euserid = $USER->id
            ORDER BY RB.name";
        
        if (!$user_credentials = get_records_sql($sql)){
        	$this->content->items[] = get_string('nobooks', 'blocks/my_books');
        	$this->content->icons[] = '';
        } else {
        
	        foreach ($user_credentials as $user_credential){
	        	/// load book data
	        	if (!$book = get_record('rcommon_books', 'isbn', $user_credential->isbn)){
	        		//$this->content->items[] = get_string('error_loading_data', 'blocks/my_books').$user_credential->isbn;  //debug mode
	        		//$this->content->icons[] = '<img src="'.$CFG->wwwroot.'/mod/rscorm/icon.gif" class="icon" alt="rscorm icon" />';  //debug mode
	        	    continue;	
	        	}
	        	
	        	/// check the format of the book
	        	if ($book->format == 'scorm'){
	        		
	        		/// check rscorm to know if isset entry for that book
	        		if ($rscorm = get_record('rscorm', 'course', 1, 'bookid', $book->id, 'unitid', 0)){
	        			
	        			///isset, then search course_module and print link
	        			if (!$cm = get_coursemodule_from_instance('rscorm', $rscorm->id, 1)){
	        				$this->content->items[] = get_string('error_loading_data', 'blocks/my_books');
	        				$this->content->icons[] = '<img src="'.$CFG->wwwroot.'/mod/rscorm/icon.gif" class="icon" alt="rscorm icon" />';
	        				continue;        			
	        			}
	        			$a = '<a href="'.$CFG->wwwroot.'/mod/rscorm/view.php?id='.$cm->id.'" title="'.$book->name.'"';
	        			if ($CFG->mybooks_viewer_opening == 1){
	        				$a .= ' target="_blank"';
	        			}
	        			$a .= '>'.$book->name.'</a>';
	        			$this->content->items[] = $a;
	        			$this->content->icons[]='<img src="'.$CFG->wwwroot.'/mod/rscorm/icon.gif" class="icon" alt="rscorm icon" />';
	        		}else{
	        			///no isset, then add new rscorm        			
	        		    $add->course         = 1;
	// MARSUPIAL ********* MODIFIED	-> Fixed bug when save activity name in db
	// 2011.09.01 @mmartinez
	        		    $add->name           = addslashes($book->name);
	// ********** ORIGINAL
	                    //$add->name           = $book->name;
	// ********** FI
	        		    $add->levelid        = $book->levelid; 
	                    $add->isbn           = $book->id;
	                    $add->unit           = 0;
	                    $add->activity       = 0;
	                    $add->summary        = 'Auto added from my_books block';
	                    $add->version        = '';
	                    $add->maxgrade       = 0;
	                    $add->grademethod    = 0;
	        		    $add->whatgrade      = 0;
	        		    $add->maxattempt     = 1;
	        		    $add->updatefreq     = 0;
	        		    $add->md5hash        = '';
	        		    $add->launch         = 0;
	        		    $add->skipview       = 2;
	        		    $add->hidebrowse     = 0;
	        		    $add->hidetoc        = 1;
	        		    $add->hidenav        = 1;
	        		    $add->auto           = 0;
	        		    $add->popup          = $CFG->mybooks_activity_opening;
	        		    $add->resizable      = $CFG->mybooks_resizable;
	        		    $add->scrollbars     = $CFG->mybooks_scrollbars;
	        		    $add->directories    = $CFG->mybooks_directories;
	        		    $add->location       = $CFG->mybooks_location;
	        		    $add->menubar        = $CFG->mybooks_menubar;
	        		    $add->toolbar        = $CFG->mybooks_toolbar;
	        		    $add->status         = $CFG->mybooks_status;
	        		    $add->width          = $CFG->mybooks_width; 
					    $add->height         = $CFG->mybooks_height;        		    
	        		    
					    $add->section        = 2;
					    $add->visible        = 1 ;
					    $module = get_record('modules', 'name', 'rscorm', '', '', '', '', 'id');
					    $add->module        = $module->id;
					    
					    include_once($CFG->dirroot.'/mod/rscorm/lib.php');
					    
					    /// add entry to rscorm table
					    if (!$add->instance = rscorm_add_instance($add)){
					    	$this->content->items[] = get_string('error_loading_data', 'blocks/my_books');
					    	$this->content->icons[] = '<img src="'.$CFG->wwwroot.'/mod/rscorm/icon.gif" class="icon" alt="rscorm icon" />';
	        	            return $this->content;
					    }
					
					    if (! $add->coursemodule = add_course_module($add) ) {
					        $this->content->items[] = get_string('error_loading_data', 'blocks/my_books');
					        $this->content->icons[] = '<img src="'.$CFG->wwwroot.'/mod/rscorm/icon.gif" class="icon" alt="rscorm icon" />';
	        	            return $this->content;
					    }
					    if (! $sectionid = add_mod_to_section($add) ) {
					        $this->content->items[] = get_string('error_loading_data', 'blocks/my_books');
					        $this->content->icons[] = '<img src="'.$CFG->wwwroot.'/mod/rscorm/icon.gif" class="icon" alt="rscorm icon" />';
	        	            return $this->content;
					    }
					
					    if (! set_field("course_modules", "section", $sectionid, "id", $add->coursemodule)) {
					        $this->content->items[] = get_string('error_loading_data', 'blocks/my_books');
					        $this->content->icons[] = '<img src="'.$CFG->wwwroot.'/mod/rscorm/icon.gif" class="icon" alt="rscorm icon" />';
	        	            return $this->content;
					    }
					
					    // make sure visibility is set correctly (in particular in calendar)
					    set_coursemodule_visible($add->coursemodule, $add->visible);
					
					    if (isset($add->cmidnumber)) { //label
					        // set cm idnumber
					        set_coursemodule_idnumber($add->coursemodule, $add->cmidnumber);
					    }
	        			
					    $a = '<a href="'.$CFG->wwwroot.'/mod/rscorm/view.php?id='.$add->coursemodule.'" title="'.$book->name.'"';
					    if ($CFG->mybooks_viewer_opening == 1){
					    	$a .= ' target="_blank"';
					    }
					    $a .= '>'.$book->name.'</a>';
	        			$this->content->items[] = $a;
	        			$this->content->icons[]='<img src="'.$CFG->wwwroot.'/mod/rscorm/icon.gif" class="icon" alt="rscorm icon" />';        			
	        		}
	        		
	        	} else {
	        		// check rcontent to know if isset entry for that book
	        		if ($rcontent = get_record('rcontent', 'course', 1, 'bookid', $book->id, 'unitid', 0)){
	        			///isset, then search course_module and print link
	        			if (!$cm = get_coursemodule_from_instance('rcontent', $rcontent->id, 1)){
	        				$this->content->items[] = get_string('error_loading_data', 'blocks/my_books');
	        				$this->content->icons[]='<img src="'.$CFG->wwwroot.'/mod/rcontent/icon.gif" class="icon" alt="rscorm icon" />';
	        				continue;        			
	        			}
	        			$a = '<a href="'.$CFG->wwwroot.'/mod/rcontent/view.php?id='.$cm->id.'" title="'.$book->name.'"';
	        			if ($CFG->mybooks_viewer_opening == 1){
	        				$a .= ' target="_blank"';
	        			}
	        			$a .= '>'.$book->name.'</a>';
	        			$this->content->items[] = $a;
	        			$this->content->icons[]='<img src="'.$CFG->wwwroot.'/mod/rcontent/icon.gif" class="icon" alt="rscorm icon" />';
	        		} else {
	        			///no isset, then add new rcontent        			
	        		    $add->course         = 1;
	// MARSUPIAL ********* MODIFIED	-> Fixed bug when save activity name in db
	// 2011.09.01 @mmartinez
	        		    $add->name           = addslashes($book->name);
	// ********** ORIGINAL
	                    //$add->name           = $book->name;
	// ********** FI
	        		    $add->levelid        = $book->levelid; 
	                    $add->isbn           = $book->id;
	                    $add->unit           = 0;
	                    $add->activity       = 0;
	                    $add->summary        = 'Auto added from my_books block';
	        		    $add->whatgrade      = 0;
	        		    $add->windowpopup    = 0;
	        		    $add->framepage      = 1;
	        		    $add->windowpopup    = $CFG->mybooks_activity_opening;
	        		    $add->resizable      = $CFG->mybooks_resizable;
	        		    $add->scrollbars     = $CFG->mybooks_scrollbars;
	        		    $add->directories    = $CFG->mybooks_directories;
	        		    $add->location       = $CFG->mybooks_location;
	        		    $add->menubar        = $CFG->mybooks_menubar;
	        		    $add->toolbar        = $CFG->mybooks_toolbar;
	        		    $add->status         = $CFG->mybooks_status;
	        		    $add->width          = $CFG->mybooks_width; 
					    $add->height         = $CFG->mybooks_height;       		    
	        		    
					    $add->section        = 2;
					    $add->visible        = 1 ;
					    $module = get_record('modules', 'name', 'rcontent', '', '', '', '', 'id');
					    $add->module         = $module->id;
					    
					    include_once($CFG->dirroot.'/mod/rcontent/lib.php');
					    
					    /// add entry to rscorm table
					    if (!$add->instance = rcontent_add_instance($add)){
					    	$this->content->items[] = get_string('error_loading_data', 'blocks/my_books');
					    	$this->content->icons[]='<img src="'.$CFG->wwwroot.'/mod/rcontent/icon.gif" class="icon" alt="rscorm icon" />';
	        	            return $this->content;
					    }
					
					    if (! $add->coursemodule = add_course_module($add) ) {
					        $this->content->items[] = get_string('error_loading_data', 'blocks/my_books');
					        $this->content->icons[]='<img src="'.$CFG->wwwroot.'/mod/rcontent/icon.gif" class="icon" alt="rscorm icon" />';
	        	            return $this->content;
					    }
					    if (! $sectionid = add_mod_to_section($add) ) {
					        $this->content->items[] = get_string('error_loading_data', 'blocks/my_books');
					        $this->content->icons[]='<img src="'.$CFG->wwwroot.'/mod/rcontent/icon.gif" class="icon" alt="rscorm icon" />';
	        	            return $this->content;
					    }
					
					    if (! set_field("course_modules", "section", $sectionid, "id", $add->coursemodule)) {
					        $this->content->items[] = get_string('error_loading_data', 'blocks/my_books');
					        $this->content->icons[]='<img src="'.$CFG->wwwroot.'/mod/rcontent/icon.gif" class="icon" alt="rscorm icon" />';
	        	            return $this->content;
					    }
					
					    // make sure visibility is set correctly (in particular in calendar)
					    set_coursemodule_visible($add->coursemodule, $add->visible);
					
					    if (isset($add->cmidnumber)) { //label
					        // set cm idnumber
					        set_coursemodule_idnumber($add->coursemodule, $add->cmidnumber);
					    }
	        			
					    $a = '<a href="'.$CFG->wwwroot.'/mod/rcontent/view.php?id='.$add->coursemodule.'" title="'.$book->name.'"';
					    if ($CFG->mybooks_viewer_opening == 1){
					    	$a .= ' target="_blank"';
					    }
					    $a .= '>'.$book->name.'</a>';
					    $this->content->items[] = $a;
	        			$this->content->icons[]='<img src="'.$CFG->wwwroot.'/mod/rcontent/icon.gif" class="icon" alt="rscorm icon" />'; 
	        		}        		
	        	}        	
	        }
        }
// MARSUPIAL ************ AFEGIT -> EVO: credentials
// 2012.07.06 @mmartinez
		$bt = '';
        $context = get_context_instance(CONTEXT_SYSTEM); // pinned blocks do not have own context		
		if (has_capability('blocks/my_books:managecredentials', $context)){
			$bt = '<a href="' . $CFG->wwwroot . '/blocks/my_books/manageKey.php" title="' . get_string('manage_button_title', 'block_my_books') . '"><button>' . get_string('manage_button', 'block_my_books') . '</button></a>';
		}
		if ($CFG->mybooks_addkey){
			$bt = !empty($bt)? $bt . ' ': '';
			$bt .= '<a href="' . $CFG->wwwroot . '/blocks/my_books/addKey.php" title="' . get_string('addkey_button_title', 'block_my_books') . '"><button>' . get_string('addkey_button', 'block_my_books') . '</button></a>';
		}
		$this->content->items[] = '<br>' . $bt;
		$this->content->icons[] = '';
// *********** FI
    	return $this->content;
    }
}

// ************** END
?>
