
<div class="postcats index">
	<h2><?php echo __('Postcats'); ?></h2>
	<table cellpadding="10" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('post_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($postcats as $postcat): ?>
	<tr>
		<td><?php echo h($postcat['Postcat']['id']); ?>&nbsp;</td>
		<td><?php echo h($postcat['Postcat']['name']); ?>&nbsp;</td>
		<td><?php echo h($postcat['Postcat']['post_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', 'admin' => false, $postcat['Postcat']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'admin_edit', $postcat['Postcat']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $postcat['Postcat']['id']), null, __('Are you sure you want to delete # %s?', $postcat['Postcat']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<br>
		<?php echo $this->Html->link(__('New Postcat'), array('action' => 'add')); ?>

