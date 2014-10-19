<?php
/*
 *
 * File: index.php
 * Description: Main controller
 *
*/

//
// Some variables
//

define('BASE_DIR', dirname(__FILE__));
define('TEMPLATE_DIR', BASE_DIR . '/templates/');

//
// Set headers
//

header('Content-Type: text/html; charset=utf-8');

//
// Include the libraries
//

require BASE_DIR . '/vendor/autoload.php';

//
// Class Loader (that loads the correct template)
//

class Loader {
    
    //
    // Internal variables
    //
    
    private $template;
    
    //
    // Constructor
    //
    
    public function __construct() {
        
        //
        // Smarty
        //
        
        $this->template = new Smarty();
        $this->template->left_delimiter = '[[+'; 
        $this->template->right_delimiter = ']]';
        $this->template->assign('TEMPLATE_DIR', TEMPLATE_DIR);
        $this->template->assign('TOP_LEVEL_MENU', '');
        $this->template->assign('SECOND_LEVEL_MENU', '');
        
        //
        // Analyze query
        //
        
        $this->analyzeQuery();
    }
    
    //
    // Analyze the query and check what template to load
    //
    
    private function analyzeQuery() {
        // Find out what file to display
        if (!isset($_GET['q']) or strlen($_GET['q']) == 0) {
            // Display index
            $this->template->display('index.tpl');
        }
        else {
            // Dynamically fetch template (or display 404)
            $q_raw = explode('/', $_GET['q']);
            $q = [];
            foreach ($q_raw as $v) {
                if (strlen($v) > 0) {
                    $q[] = $v;
                }
            }
            
            // Check what was returned
            if (count($q) == 0) {
                // Return 404
                $this->return404();
            }
            else if (count($q) == 1) {
                // Root template, check if exists
                if (file_exists(TEMPLATE_DIR . '/' . $q[0] . '.tpl')) {
                    // Template exists, fetch it
                    $this->template->assign('TOP_LEVEL_MENU', $q[0]);
                    $this->template->display($q[0] . '.tpl');
                }
                else {
                    // No template named this, check if directory
                    if (is_dir(TEMPLATE_DIR . '/' . $q[0])) {
                        // Is directory, fetch index.tpl within that directory
                        $this->template->assign('TOP_LEVEL_MENU', $q[0]);
                        $this->template->display($q[0] . '/index.tpl');
                    }
                    else {
                        // Is not a directory, just return 404
                        $this->return404();
                   }
                }
            }
            else {
                // Rebuild query
                $query = implode('/', $q);
                
                if (file_exists(TEMPLATE_DIR . '/' . $query . '.tpl')) {
                    // Template exists, fetch it
                    $this->template->assign('TOP_LEVEL_MENU', $q[0]);
                    $this->template->assign('SECOUND_LEVEL_MENU', $q[count($q) - 1]);
                    $this->template->display($query . '.tpl');
                }
                else {
                    // No template named this, check if directory
                    if (is_dir(TEMPLATE_DIR . '/' . $query)) {
                        // Is directory, fetch index.tpl within that directory
                        $this->template->assign('TOP_LEVEL_MENU', $q[0]);
                        $this->template->assign('SECOUND_LEVEL_MENU', $q[count($q) - 1]);
                        
                        $this->template->display($query . '/index.tpl');
                    }
                    else {
                        // Is not a directory, just return 404
                        $this->return404();
                   }
                }
            }
        }
    }
    
    //
    // Return 404 template
    //
    
    private function return404() {
        $this->template->display('404.tpl');
    }
    
}

//
// New instance of Loader
//

new Loader();

?>