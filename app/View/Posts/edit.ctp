<div style="padding:20px 0px 20px 20px; font-size:20pt; font-weight:bold">Edit Post</div>

<div>
	<?php echo $this->Form->create('Post' , array( 'type' => 'post' ));?>
		<fieldset>
	 		<legend><?php __('Edit Post');?></legend>
		<?php
			echo $this->Form->hidden('_id');
			echo $this->Form->input('title');
			echo $this->Form->input('body');
		?>
		</fieldset>
	<?php echo $this->Form->end('Submit');?>
</div>
