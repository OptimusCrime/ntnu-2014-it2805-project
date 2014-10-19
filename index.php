<?php
/*
 *
 * File: index.php
 * Description: Main controller
 *
*/

//
// Set headers
//

header('Content-Type: text/html; charset=utf-8');

//
// Include the libraries
//

require dirname(__FILE__) . '/vendor/autoload.php';

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