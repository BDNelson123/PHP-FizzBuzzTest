<?php

include('AppModel.php');

App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
		    $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}

    public $validate = array(
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'An email is required.'
            ),
            'email' => array(
                'rule' => array('email'),
                'message' => 'You must use a valid email address.'
            ),
            'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'This email address has already been taken.'
            )
        ),
        'password' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required.'
            ),
            'minLength' => array(
                'rule' => array('minLength', 6),
                'message' => 'Password must be at least 6 character long.'
            ),
            'alphaNumeric' => array(
                'rule' => array('alphaNumeric'),
                'message' => 'Password must only contain numbers and letters.'
            ),
            'upperLowerLetter' => array(
                'rule' => array('upperLowerLetter'),
                'message' => 'Password must containt an upper-case letter, a lower-case letter, and a number.'
            )
        ),
        'firstname' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'A first name is required.'
            ),
            'alpha' => array(
                'rule' => array('alpha'),
                'message' => 'First name must only contain letters'
            )
        ),
        'lastname' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'A last name is required.'
            ),
            'alpha' => array(
                'rule' => array('alpha'),
                'message' => 'Last name must only contain letters'
            )
        )
    );

}
?>
