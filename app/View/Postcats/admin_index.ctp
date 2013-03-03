<<<<<<< HEAD
   <?php echo $this->Html->link(__('Add New Category'), array('action' => 'add')); ?>
<div class="postcats index">

=======

<div class="postcats index">
	<h2><?php echo __('Postcats'); ?></h2>
>>>>>>> c2ebab6aa96e140f8808a1c0205ec7240c356d3b
	<table cellpadding="10" cellspacing="0">
	<tr>


	</tr>
	<?php if (!empty($Categorylist)): ?>
	<?php foreach($Categorylist as $key=>$value): ?>
	<tr>
                <?php if ($parents[0]): ?>
		<td><?php echo $value['Postcat']['name']; ?>&nbsp;</td>

		<td class="actions">
<<<<<<< HEAD
			<?php echo $this->Html->link(__('View'), array('action' => 'main_view', 'admin' => false, $value['Postcat']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'admin_edit', $value['Postcat']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $value['Postcat']['id']), null, __('Are you sure you want to delete # %s?', $value['Postcat']['id'])); ?>
=======
			<?php echo $this->Html->link(__('View'), array('action' => 'view', 'admin' => false, $postcat['Postcat']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'admin_edit', $postcat['Postcat']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $postcat['Postcat']['id']), null, __('Are you sure you want to delete # %s?', $postcat['Postcat']['id'])); ?>
>>>>>>> c2ebab6aa96e140f8808a1c0205ec7240c356d3b
		</td>
	</tr>  
	 <?php 
            $parent=$value['Postcat']['id'];
         
         endif ?>



	          <?php if ($parent==$value['Postcat']['parent_id']): ?>
	 	<td><li><?php echo $value['Postcat']['name']; ?></td>

		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', 'admin' => false, $value['Postcat']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'admin_edit', $value['Postcat']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $value['Postcat']['id']), null, __('Are you sure you want to delete # %s?', $value['Postcat']['id'])); ?>
		</td>
	</tr>         <?php endif ?>



<?php endforeach; ?>
<?php endif ?>
	</table>
	<p>

	</div>
</div>
<br>
<<<<<<< HEAD

=======
		<?php echo $this->Html->link(__('New Postcat'), array('action' => 'add')); ?>
>>>>>>> c2ebab6aa96e140f8808a1c0205ec7240c356d3b

