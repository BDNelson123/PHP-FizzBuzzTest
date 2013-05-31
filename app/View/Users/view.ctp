<h1><b><?php echo $user['User']['firstname'].' '.$user['User']['lastname'] ?></b></h1>

<div>E-mail: <?php echo $user['User']['email']; ?></div>

<div>DOB: <?php echo $user['User']['dob_month'].' - '.$user['User']['dob_day'].' - '.$user['User']['dob_year'] ?></div>

<div>Registered: <?php echo date("n-j-Y", strtotime($user['User']['created'])); ?></div>

<br><br>

<div style="text-align:center; font-size:14pt">
<? echo $this->Html->link('Begin FizzBuzz Test', array('controller'=>'Fizzbuzzs', 'action'=>'test', $user['User']['id'], '1')); ?>
</div>
















