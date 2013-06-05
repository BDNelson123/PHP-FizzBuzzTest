<?php echo $this->Html->link('Create New Post', 'add'); ?>
<br>
<br>

<?php foreach($results as $result): ?>

	id: <?php echo $result['Post']['_id']; ?>
	[<?php echo $this->Html->link('edit', array('controller' => 'Posts', 'action' => 'edit', $result['Post']['_id'], $this->params["pass"]["0"])); ?>]
	[<?php echo $this->Html->link('delete','delete/'.$result['Post']['_id']); ?>]<br>

	title: <?php echo $result['Post']['title']; ?><br>
	body: <?php echo $result['Post']['body']; ?><br>

	<hr>

<?php endforeach; ?>
