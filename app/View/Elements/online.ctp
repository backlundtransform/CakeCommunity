<div class="tables">Online</div>
    <br><hr><div align="center">

      <?php $online = $this->requestAction('Users/online');

        
        ?>
        <?php if (!empty($online) ): ?>
<?php foreach($online as $key=>$online ): ?>

      <?php if ($online['User']['roles'] == 'admin'): ?>  <?php echo $this->Html->link($online['User']['username'], array('controller'=>'users', 'action'=>'view', $online['User']['id'],  'admin'=>false), array('class' => 'admin')); ?> 
 <?php else: ?> <?php echo $this->Html->link($online['User']['username'], array('controller'=>'users', 'action'=>'view', $online['User']['id'],  'admin'=>false)); ?>

<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>



</div>