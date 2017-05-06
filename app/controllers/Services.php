<?php

namespace app\controllers;

use \core\View;

/**
 * Services controller
 */
class Services extends \core\Controller {

    // Before filter
    protected function before() { }

    // After filter
    protected function after() { }

    // Show the index page
    public function indexAction() {
        view::renderTemplate('services/index.html', [
            'name' => 'Vlad',
            'colors' => ['red', 'green', 'blue']
        ]);
    }	
}