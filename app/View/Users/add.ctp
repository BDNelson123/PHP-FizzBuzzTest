<div>
	<br><br>

	<?php echo $this->Form->create('User'); ?>
		<fieldset>
		    <legend><?php echo __('Register For a New Account'); ?></legend>
		    <?php 
		    echo $this->Form->input('firstname', array('label' => 'First Name'));
		    echo $this->Form->input('lastname', array('label' => 'Last Name'));
			echo $this->Form->input('email');
		    echo $this->Form->input('password');
		    echo $this->Form->input('password_confirm', array('type' => 'password'));

			echo 
			$this->Form->input('dob_month', array('style' => 'display:inline', 'div' => false, 'label' => '<b>Date-of-Birth</b>', 'options'=>array_combine(range(1,12), range(1,12)))).' - '.
			$this->Form->input('dob_day', array('style' => 'display:inline', 'div' => false, 'label' => false, 'options'=>array_combine(range(1,31), range(1,31)))).' - '.
			$this->Form->input('dob_year', array('style' => 'display:inline', 'div' => false, 'label' => false, 'options'=>array_combine(range(date('Y'), date('Y')-100), range(date('Y'), date('Y')-100))))
			?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
