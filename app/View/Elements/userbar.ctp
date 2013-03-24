<?php if ($logged_in): ?>


 
 <div id="userbar"><ul>
   <li> 
   
   
   <?php echo $current_user['username']; ?>
     <ul>
     <li><?php echo $this->Html->link('Profile', array('controller'=>'users', 'action'=>'view', $current_user['id'],  'admin'=>false)); ?></li>
    <li><?php echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'Logout', 'admin'=> false)); ?> </li>
     </ul>
   </li>
  <?php if (isset($current_user['roles']) && $current_user['roles'] == 'admin'):?>
  <li>
 Content management
  <ul>
 <li><?php echo $this->Html->link('Comment management', array('controller'=>'comments', 'action'=>'admin_index', 'admin'=>true)); ?></li>
  <li><?php echo $this->Html->link('Thread management', array('controller'=>'threadanswers', 'action'=>'admin_index', 'admin'=>true)); ?></li>


</ul>
 <li>Category management
  <ul>
  <li><?php echo $this->Html->link('Posts', array('controller'=>'postcats', 'action'=>'admin_index', 'admin'=>true)); ?> </li>
 </ul>
 </li>
 <?php endif ?>
 <?php    $newmessage  = $this->requestAction('Messages/inbox/'); ?>

 
  <li><?php echo 'Inbox('.count($newmessage).')';?>
  
   <ul>
   <li><?php echo $this->Html->link('Read Messages', array('controller'=>'Messages', 'action' => 'inbox', 'admin' => false)); ?> </li>
  <li><?php echo $this->Html->link('Send Messages', array('controller'=>'Messages', 'action' => 'compose', 'admin' => false)); ?> </li>
 </ul></li>
   
 </ul></div>
 <?php endif; ?>
