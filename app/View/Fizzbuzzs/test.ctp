<? if($this->params["pass"]["1"] == 'incorrect'){ ?>

	<div style="padding:20px 0px 35px 0px; font-size:20pt; font-weight:bold; text-align:center">Your answer was incorrect.  Here are your test results.</div>

	<table style="width:800px; margin: 0 auto;">
		<tr>
			<td><b>Number</b></td>
			<td><b>Correct Answer</b></td>
			<td><b>Your Answer</b></td>
		</tr>
		<? for ($i = 1; $i <= $this->params["pass"]["2"]; $i++){ ?>
			<tr>
				<td><? echo $i ?></td>
				<td>
					<? 
					if($i % 5 == 0 and $i % 3 == 0){
						$Correct = 'FizzBuzz';
					} elseif($i % 3 == 0){	
						$Correct = 'Fizz';
					} elseif($i % 5 == 0){	
						$Correct = 'Buzz';
					} else {
						$Correct = 'None of the Above';
					} 
					echo $Correct;
					?>
				</td>
				<td>
					<?
					if($i < $this->params["pass"]["2"]){
						echo '&#10004';
					} else {
						echo $this->params["pass"]["3"];
					}
					?>
				</td>
			</tr>
		<? } ?>
	</table>

	<br><br>

	<div style="text-align:center; font-size:14pt">
	<? echo $this->Html->link('Begin FizzBuzz Test Again?', array('controller'=>'Fizzbuzzs', 'action'=>'test', $this->params["pass"]["0"], '1')); ?>
	</div>
		
<? } else { ?>

	<div style="padding:20px 0px 35px 20px; font-size:20pt; font-weight:bold">Is the number <? echo $this->params["pass"]["1"]; ?> a ...</div>

	<?
	echo $this->Form->create('fizzbuzz', array('type' => 'post', 'controller'=>'fizzbuzzs', 'action'=>'test'));
	echo $this->Form->input('id', array('type' => 'hidden', 'value' => $this->params["pass"]["0"]));
	echo $this->Form->input('number', array('type' => 'hidden', 'value' => $this->params["pass"]["1"]));
	echo $this->Form->input('answer', array('type' => 'radio','options' => 
		array(
			'Fizz' => 'Fizz <span style="font-size:8pt; font-style:italic">(Divisible by 3)</span>', 
			'Buzz' => 'Buzz <span style="font-size:8pt; font-style:italic">(Divisible by 5)</span>', 
			'FizzBuzz' => 'FizzBuzz <span style="font-size:8pt; font-style:italic">(Divisible by 3 and 5)</span>', 
			'None' => 'None of the Above'
		)
	));
	echo $this->Form->end(__('Submit'));
	?>

<? } ?>
