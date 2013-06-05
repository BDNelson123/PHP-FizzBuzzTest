<div style="padding:20px 0px 20px 20px; font-size:20pt; font-weight:bold">Create a New Post</div>

<div>
	<?php echo $this->Form->create('Post' , array( 'type' => 'post' ));?>
		<fieldset>
	 		<legend><?php __('Add Post');?></legend>
		<?php
			echo $this->Form->input('title');
			echo $this->Form->input('body');
			echo $this->Form->input('userid', array('type' => 'hidden'));
		?>
		</fieldset>
	<?php echo $this->Form->end('Submit');?>
</div>
