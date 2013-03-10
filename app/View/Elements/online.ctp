<div class="tables">Online</div>
    <div class="innertube">     <br><hr>

      <?php $online = $this->requestAction('Users/online');

        
        ?>
        <?php if (!empty($online) ): ?><div align="center">
<?php foreach($online as $key=>$online ): ?>

      <?php if ($online['User']['roles'] == 'admin'): ?>  <?php echo $this->Html->link($online['User']['username'], array('controller'=>'users', 'action'=>'view', $online['User']['id'],  'admin'=>false), array('class' => 'admin')); ?> 
 <?php else: ?> <?php echo $this->Html->link($online['User']['username'], array('controller'=>'users', 'action'=>'view', $online['User']['id'],  'admin'=>false)); ?>
<?php endif; ?>
<?php endforeach; ?>
</div><?php endif; ?>



</div>