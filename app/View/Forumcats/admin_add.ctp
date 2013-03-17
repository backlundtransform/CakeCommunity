

<div class="postcats form">
<?php echo $this->Form->create('Postcat'); ?>
	<fieldset>
		<legend><?php echo __('Add Postcat'); ?></legend>
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

		<li><?php echo $this->Html->link(__('List Postcats'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
