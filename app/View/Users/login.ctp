<? `git pull` ?>

<div>
	<br><br>

	<?php echo $this->Session->flash('auth'); ?>

	<?php echo $this->Form->create('User'); ?>
		<fieldset>
		    <legend><?php echo __('Please enter your email address and password'); ?></legend>
		    <?php echo $this->Form->input('email');
		    echo $this->Form->input('password');
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Login')); ?>
</div>

<br><br>

<div style="text-align:center; font-size:14pt">
	<? echo $this->Html->link('Click Here to Register.', array('controller'=>'Users', 'action'=>'add')); ?>
</div>
