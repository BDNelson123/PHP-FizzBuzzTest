<?php

include('AppController.php');

class FizzbuzzsController extends AppController {

	var $uses = array();

	public function beforeFilter() {
	    	parent::beforeFilter();
	   	$this->Auth->allow('test');
	}

	public function isAuthorized($user) {
		return true;
	}

	private function _answer($number,$answer) {
		if($number % 3 == 0 && $number % 5 == 0) {
			$correct = 'FizzBuzz';
		} elseif($number % 3 == 0) { 
			$correct = 'Fizz';
		} elseif($number % 5 == 0) { 
			$correct = 'Buzz';
		} else {
			$correct = 'None';
		}
		
		return $answer == $correct;
	}

	private function _correct($id,$number) {	
		$this->redirect(array('controller' => 'Fizzbuzzs', 'action' => 'test', $id, $number + 1));
	}

	private function _incorrect($id,$number,$answer) {
		$this->redirect(array('controller' => 'Fizzbuzzs', 'action' => 'test', $id, 'incorrect', $number, $answer));
	}

	public function test($_id,$_number,$_answer) {
		// This should be done with a constructor but CakePHP seems to not like __constructor in a controller
		$_id = $this->data['fizzbuzz']['id'];
		$_number = $this->data['fizzbuzz']['number'];
		$_answer = $this->data['fizzbuzz']['answer'];

		if($_POST){
			if($this->_answer($_number,$_answer) == true) {
				$this->_correct($_id,$_number);
			} else {
				$this->_incorrect($_id,$_number,$_answer);
			}
		}
	}

}
?>
