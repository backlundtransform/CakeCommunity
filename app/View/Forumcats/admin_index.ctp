   <?php echo $this->Html->link(__('Add New Category'), array('action' => 'add')); ?>
<div class="postcats index">

	<table cellpadding="10" cellspacing="0">
	<tr>


	</tr>
	<?php if (!empty($Categorylist)): ?>
	<?php foreach($Categorylist as $key=>$value): ?>
	<tr>
                <?php if ($value['Forumcat']['parent_id']==0): ?>
		<td><?php echo $value['Forumcat']['name']; ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'main_view', 'admin' => false, $value['Forumcat']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'admin_edit', $value['Forumcat']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $value['Forumcat']['id']), null, __('Are you sure you want to delete # %s?', $value['Forumcat']['id'])); ?>
		</td>
	</tr>  
	 <?php 
            $parent=$value['Forumcat']['id'];
         
         endif ?>



	          <?php if ($parent==$value['Forumcat']['parent_id']): ?>
	 	<td><li><?php echo $value['Forumcat']['name']; ?></td>

		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', 'admin' => false, $value['Forumcat']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'admin_edit', $value['Forumcat']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $value['Forumcat']['id']), null, __('Are you sure you want to delete # %s?', $value['Forumcat']['id'])); ?>
		</td>
	</tr>         <?php endif ?>



<?php endforeach; ?>
<?php endif ?>
	</table>
	<p>

	</div>
</div>
<br>


