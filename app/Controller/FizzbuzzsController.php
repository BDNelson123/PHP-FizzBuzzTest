<?php

include('AppController.php');

class FizzbuzzsController extends AppController {

	var $uses = array();

	public function beforeFilter() {
    	parent::beforeFilter();
	}

	public function isAuthorized($user) {
	   	$this->Auth->allow();
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

	public function test() {
		$id = $this->Auth->user('id');
		$number = $this->data['fizzbuzz']['number'];
		$answer = $this->data['fizzbuzz']['answer'];

		if($_POST){
			if($this->_answer($number,$answer) == true) {
				$this->_correct($id,$number);
			} else {
				$this->_incorrect($id,$number,$answer);
			}
		}
	}

}
?>
