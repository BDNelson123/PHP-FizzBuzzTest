<?php echo $this->Html->link('Create New Post', array('controller' => 'Posts', 'action' => 'add', $this->params['pass']['0'])); ?>
<br>
<br>

<?php
$i = 0; 
foreach($results as $result): 
$i ++;
?>

	id: <?php echo $result['Post']['_id']; ?>
	[<?php echo $this->Html->link('edit', array('controller' => 'Posts', 'action' => 'edit', $result['Post']['_id'], $this->params["pass"]["0"])); ?>]
	[<?php echo $this->Html->link('delete','delete/'.$result['Post']['_id']); ?>]<br>

	title: <?php echo $result['Post']['title']; ?><br>
	body: <?php echo $result['Post']['body']; ?><br>

	<hr>

<?php endforeach; ?>

<? if($i < 1){ ?>
	<div>
		You have not created any posts yet.  Please click on Create New Post.
	</div>
<? } ?>
