<?php

namespace app\controllers;

use \core\view;

/**
 * Home controller
 */
class Home extends \core\Controller {

    // Before filter
    protected function before() {
        //echo "(before)";
        // return false;
    }

    // After filter
    protected function after() {
        //echo "(after)";
    }

    // Show the index page
    public function indexAction() {
        view::renderTemplate('home/index.html', [
            'name' => 'Vlad',
            'colors' => ['red', 'green', 'blue']
        ]);
    }	
}