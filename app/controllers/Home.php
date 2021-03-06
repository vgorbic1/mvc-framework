<?php

namespace app\controllers;

use \core\View;

/**
 * Home controller
 */
class Home extends \core\Controller {

    // Before filter
    protected function before() { }

    // After filter
    protected function after() { }

    // Show the index page
    public function indexAction() {
        view::renderTemplate('home/index.html');
    }	
}