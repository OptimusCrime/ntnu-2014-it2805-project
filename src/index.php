<?php
/*
 * File: index.php
 * Description: Project root file
 * Written by: Thomas Gautvedt, Krisitan Ekle, Ingeborg Ødegård Oftedal
 * Project: IT2805 2014
 * Copyright: Meh
*/

/*
 * Set headers
 */

header('Content-Type: text/html; charset=utf-8');

/*
 * Set timezone
 */

date_default_timezone_set('Europe/Oslo');

/*
 * Define some variables
 */

define('BASE_DIR', dirname(__FILE__));
define('ROOT_DIR', dirname(BASE_DIR));

/*
 * Composer autoloader
 */

require ROOT_DIR . '/vendor/autoload.php';

/*
 * Class Loader - Loads the different templates
 */

class Loader {
    
    /*
     * Internal variables
     */
    
    private $template;
    
    /*
     * Constructor
     */
    
    public function __construct() {
        
        /*
         * Smarty
         */
        
        $this->template = new Smarty();
        
        // Set delimeter
        $this->template->left_delimiter = '[[+'; 
        $this->template->right_delimiter = ']]';
        
        // Set different directories
        $this->template->setTemplateDir(BASE_DIR . '/templates/');
        $this->template->setCompileDir(BASE_DIR . '/templates_c/');
        $this->template->setCacheDir(BASE_DIR . '/cache/');
        
        // Set caching
        //$this->template->setCaching(Smarty::CACHING_LIFETIME_CURRENT);
        
        // Set menu placeholders
        $this->template->assign('TOP_LEVEL_MENU', '');
        $this->template->assign('SECOND_LEVEL_MENU', '');
        
        // Get the base url
        $this->template->assign('URL', 'http://' . $_SERVER['HTTP_HOST']);
        
        /*
         * Get tempate
         */
        
        $this->getTemplate();
    }
    
    /*
     * Get the query based on the url
     */
    
    private function getTemplate() {
        // Find out what file to display
        if ($_SERVER['REQUEST_URI'] == '/' or strlen($_SERVER['REQUEST_URI']) == 0) {
            // Display index
            $this->template->assign('TOP_LEVEL_MENU', 'index');
            $this->template->display('index.tpl');
        }
        else {
            // Dynamically fetch template (or display 404)
            $q_raw = explode('/', $_SERVER['REQUEST_URI']);
            $q = [];
            foreach ($q_raw as $v) {
                if (strlen($v) > 0) {
                    $q[] = $v;
                }
            }
            
            $display_404 = false;
            
            // Check what was returned
            if (count($q) == 0) {
                // Return 404
                $display_404 = true;
            }
            else if (count($q) == 1) {
                // Root template, check if exists
                if (file_exists(BASE_DIR . '/templates/' . $q[0] . '.tpl')) {
                    // Template exists, fetch it
                    $this->template->assign('TOP_LEVEL_MENU', $q[0]);
                    $this->template->display($q[0] . '.tpl');
                }
                else {
                    // No template named this, check if directory
                    if (is_dir(BASE_DIR . '/templates/' . $q[0])) {
                        // Is directory, fetch index.tpl within that directory
                        $this->template->assign('TOP_LEVEL_MENU', $q[0]);
                        $this->template->display($q[0] . '/index.tpl');
                    }
                    else {
                        // Is not a directory, just return 404
                        $display_404 = true;
                   }
                }
            }
            else {
                // Rebuild query
                $query = implode('/', $q);
                
                if (file_exists(BASE_DIR . '/templates/' . $query . '.tpl')) {
                    // Template exists, fetch it
                    $this->template->assign('TOP_LEVEL_MENU', $q[0]);
                    $this->template->assign('SECOUND_LEVEL_MENU', $q[count($q) - 1]);
                    $this->template->display($query . '.tpl');
                }
                else {
                    // No template named this, check if directory
                    if (is_dir(BASE_DIR . '/templates/' . $query)) {
                        // Is directory, fetch index.tpl within that directory
                        $this->template->assign('TOP_LEVEL_MENU', $q[0]);
                        $this->template->assign('SECOUND_LEVEL_MENU', $q[count($q) - 1]);
                        
                        $this->template->display($query . '/index.tpl');
                    }
                    else {
                        // Is not a directory, just return 404
                        $display_404 = true;
                   }
                }
            }
            
            // Check if we should display 404
            if ($display_404) {
                // We should display 404, but first check if any static files matches this url
                $file = ROOT_DIR . '/files/' . implode('/', $q);
                if (file_exists($file)) {
                    // Get mime type
                    $mime_type = mime_content_type($file);
                    
                    // Set header
                    header('Content-Type: ' . $mime_type . '; charset=utf-8');
                    
                    // Assign content
                    $this->template->assign('CONTENT', file_get_contents($file));
                    
                    // Display flatfile template
                    $this->template->display('flat.tpl');
                }
                else {
                    // File was not found, display 404
                    $this->return404();
                }
            }
        }
    }
    
    /*
     * Return 404 template
     */
    
    private function return404() {
        // Set header
        header('HTTP/1.0 404 Not Found');
        
        // Fetch template
        $this->template->display('404.tpl');
    }
    
}

/*
* New instance of Loader
*/

new Loader();