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
		echo $this->Html->script('jquery');
		
	 if (isset($current_user['roles']) && $current_user['roles'] != 'user') {
		echo $this->Html->script('ckeditor/ckeditor');
	 }


	        echo $this->Js->writeBuffer();
	?>
</head>
<body>
	<div id="maincontainer">


<div id="topsection"><div class="innertube">  <?php if ($logged_in): ?>
  	<?php    $newmessage  = $this->requestAction('Messages/inbox/'); ?>
Welcome <?php echo $current_user['username']; ?>. <?php echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout', 'admin' =>false )); ?>
 <br>You have 
 
       <?php echo $this->Html->link(count($newmessage), array('controller'=>'Messages', 'action' => 'inbox')); ?>
 New Messages

<?php else: ?>
<?php echo $this->Html->link('Login', array('controller'=>'users', 'action'=>'login')); ?> or
<?php echo $this->Html->link(__('Register'), array('controller' => 'users', 'action' => 'add')); ?>
<?php endif; ?>

			</div><div id='menu'><ul>
		<li><?php echo $this->Html->link(__('Main'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		
		<li><?php echo $this->Html->link(__('Members'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		
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

	<div id="leftcolumn"><?php if (!$logged_in): ?> <?php echo $this->element('loginform');?>
	<?php endif; ?>  <?php echo $this->element('postcat');?>
</div><div id="rightcolumn"> </div>


		<div id="footer">

                  </div>

</div>


</body>
</html>
