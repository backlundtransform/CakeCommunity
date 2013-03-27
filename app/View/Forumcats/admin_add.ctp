

<div class="postcats form">
<?php echo $this->Form->create('Forumcat'); ?>
	<fieldset>
		<legend><?php echo __('Add Forumcat'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('parent_id',array('label'=>'Parent'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Forumcats'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Threads'), array('controller' => 'threads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'threads', 'action' => 'add')); ?> </li>
	</ul>
</div>
