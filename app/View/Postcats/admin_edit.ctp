<?php if ($current_user['roles'] == 'admin') : ?>
<div class="postcats form">
<?php echo $this->Form->create('Postcat'); ?>
	<fieldset>
		<legend><?php echo __('Edit Postcat'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('post_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Postcat.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Postcat.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Postcats'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php endif ?>