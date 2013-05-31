<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth' => array(
		    'authenticate' => array(
		        'Form' => array(
		            'fields' => array('username' => 'email')
		        )
		    ),
            'loginRedirect' => array('controller' => 'Users', 'action' => 'view'),
            'logoutRedirect' => array('controller' => 'Users', 'action' => 'login'),
        ),
    );

    public function beforeFilter() {
        $this->Auth->allow('login');
    }

}
