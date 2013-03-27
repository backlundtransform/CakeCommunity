<?php if (!empty($Categorylist)): ?>
	<?php foreach($Categorylist as $key=>$value): ?>
	<tr>
                <?php if ($value['Forumcat']['parent_id']==0): ?>
		<td><?php echo $value['Forumcat']['name']; ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'main_view', 'admin' => false, $value['Forumcat']['id'])); ?>
		</td>
	</tr>  
	 <?php 
            $parent=$value['Forumcat']['id'];
         
         endif ?>



	          <?php if ($parent==$value['Forumcat']['parent_id']): ?>
	 	<td><li><?php echo $value['Forumcat']['name']; ?></td>

		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', 'admin' => false, $value['Forumcat']['id'])); ?>
		
		</td>
	</tr>         <?php endif ?>



<?php endforeach; ?>
<?php endif ?>
	</table>
	<p>

	</div>
</div>
<br>
