<div class='tables'>Categories</div>
        <div class='innertube'>  <?php $postcats = $this->requestAction('Postcats/index'); ?>
         <br>
	<?php foreach ($postcats as $postcat): ?>

			<?php echo $this->Html->link($postcat['Postcat']['name'], array('controller' => 'postcats','action' => 'view', $postcat['Postcat']['id'], 'admin'=>false)); ?>
        <br>
<?php endforeach; ?>  </div>

