<?php

include('AppController.php');

class FizzbuzzsController extends AppController {

	var $uses = array();

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
		if($_POST){
			if($this->_answer($this->data['fizzbuzz']['number'],$this->data['fizzbuzz']['answer']) == true) {
				$this->_correct($this->data['fizzbuzz']['id'],$this->data['fizzbuzz']['number']);
			} else {
				$this->_incorrect($this->data['fizzbuzz']['id'],$this->data['fizzbuzz']['number'],$this->data['fizzbuzz']['answer']);
			}
		}
	}

}
?>
