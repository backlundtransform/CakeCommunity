<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>

		<?php echo $title_for_layout; ?>
	</title>
	<?php

		echo $this->Html->meta('icon');

		echo $this->Html->css('layout');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('jQuery');
		echo $this->Html->script('cakejs');
		echo $this->Html->script('jquery-ui-1.10.1.custom/js/jquery-ui-1.10.1.custom.min');
		
	 if (isset($current_user['roles']) && $current_user['roles'] != 'user') {
		echo $this->Html->script('ckeditor/ckeditor');
		 
	 }


	        echo $this->Js->writeBuffer();
	?> 
</head>
<body>
	<div id="maincontainer">


<div id="topsection"><div class="innertube"> 

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
 <li><?php echo $this->Html->link('Comment management', array('controller'=>'comments', 'action'=>'admin_index', 'admin'=>true)); ?></li>
 <li>
 Category management
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

			</div><div id='menu'><ul>
		<li><?php echo $this->Html->link(__('Main'), array('controller' => 'posts', 'action' => 'index', 'admin'=>false)); ?> </li>
		
		<li><?php echo $this->Html->link(__('Members'), array('controller' => 'users', 'action' => 'index', 'admin'=>false)); ?> </li>
		
	</ul></div></div></div>

			</div></div></div>


		<div id="contentwrapper">
<div id="contentcolumn">
<div class="innertube">


			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); 
                        

                        ?>
                        

                  </div>

</div>  </div>

	<div id="leftcolumn">

                    <?php if($this->name =='Posts'):?>
                    


         <?php echo $this->element('search');?>
           <?php endif ?>
          <div id="dialog">
        <?php echo $this->element('popup');?></div>
			<?php echo $this->element('loginform');?>
	  <?php echo $this->element('postcat');?>
	   <?php echo $this->element('online');?>
</div><div id="rightcolumn"> <?php echo $this->element('commentswidget');?></div>


		<div id="footer">

                  </div>

</div>


</body>
</html>
