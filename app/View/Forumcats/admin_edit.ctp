
<div class="Forumcats form">
<?php echo $this->Form->create('Forumcat'); ?>
	<fieldset>
		<legend><?php echo __('Edit Forumcat'); ?></legend>
	<?php
		echo $this->Form->hidden('id');
		echo $this->Form->input('name');
		echo $this->Form->input('parent_id' , array('selected'=>$this->data['Forumcat']['parent_id']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Forumcat.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Forumcat.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Forumcats'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Threads'), array('controller' => 'threads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'threads', 'action' => 'add')); ?> </li>
	</ul>
</div>
