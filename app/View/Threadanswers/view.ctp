<div class="comments view">
<h2><?php  echo __('Threadsanswer'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($threadsanswer['Threadsanswer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($threadsanswer['Threadsanswer']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($threadsanswer['User']['name'], array('controller' => 'users', 'action' => 'view', $threadsanswer['Thread']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post'); ?></dt>
		<dd>
			<?php echo $this->Html->link($threadsanswer['Thread']['title'], array('controller' => 'threads', 'action' => 'view', $threadsanswer['Thread']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Answer'), array('action' => 'edit', $threadsanswer['Thread']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Answer'), array('action' => 'delete', $threadsanswer['Thread']['id']), null, __('Are you sure you want to delete # %s?', $threadsanswer['Thread']['id'])); ?> </li>
<<<<<<< HEAD
		<li><?php echo $this->Html->link(__('List Answer'), array('action' => 'index')); ?> </li>
=======
		<li><?php echo $this->Html->link(__('List Answer''), array('action' => 'index')); ?> </li>
>>>>>>> 9a68e4b438b5fa86b48466ae879b206e2030f595
		<li><?php echo $this->Html->link(__('New Answer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Thread'), array('controller' => 'thread', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Thread'), array('controller' => 'thread', 'action' => 'add')); ?> </li>
	</ul>
</div>
