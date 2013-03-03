




<div class='tables'>Categories</div>
        <div class='innertube'>  <?php $Categorylist = $this->requestAction('Postcats/index');

        
        ?>

<div class="postcats index">


	<?php foreach($Categorylist as $key=>$value): ?>

                <?php if ($value['Postcat']['parent_id']==0): ?>
                 <?php if ($key!=0): ?></div> <?php endif ?>

                              
<br>             <input name="viewmenu" class="c_p" value=<?php echo $value['Postcat']['name']; ?> type="submit"><div class="viewmenu">

	 <?php
            $parent=$value['Postcat']['id'];

         endif ?>



	          <?php if ($parent==$value['Postcat']['parent_id']): ?>

	 	<?php echo $this->Html->image('cat_arrow.png'); ?><?php echo $this->Html->link($value['Postcat']['name'], array('controller' => 'postcats', 'action' => 'view', 'admin' => false, $value['Postcat']['id'])); ?>  <br>

	        <?php endif ?>



<?php endforeach; ?>


	<p>

	</div>
</div>
<br>



<<<<<<< HEAD
=======
			<?php echo $this->Html->link($postcat['Postcat']['name'], array('controller' => 'postcats','action' => 'view', $postcat['Postcat']['id'], 'admin'=>false)); ?>
        <br>
<?php endforeach; ?>  </div>
>>>>>>> c2ebab6aa96e140f8808a1c0205ec7240c356d3b

