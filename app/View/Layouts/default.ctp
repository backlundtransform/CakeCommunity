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


<header>  <div class="innertube"> 
  <?php echo $this->element('userbar');?> 
 
			</div> <nav>  <ul>
		<li><?php echo $this->Html->link(__('Posts'), array('controller' => 'posts', 'action' => 'index', 'admin'=>false)); ?> </li>
		  <li><?php echo $this->Html->link(__('Threads'), array('controller' => 'Threads', 'action' => 'index', 'admin'=>false)); ?> </li>

		<li><?php echo $this->Html->link(__('Members'), array('controller' => 'users', 'action' => 'index', 'admin'=>false)); ?> </li>
		
	</ul><nav></div></div></div>

			</div></div></header>

		<div id="contentwrapper">
 <?php if($this->name =='Posts'):?>
<div id="contentcolumn">
   <?php else:?>
  <div id="contentcolumn2">  <?php endif ?>
<div class="innertube">


			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); 
                        

                        ?>
                        

                  </div>

</div>  </div>

	<section id="leftcolumn">
 
                    <?php if($this->name =='Posts'):?>
                    


         <?php echo $this->element('search');?>    <?php endif ?>


			<?php echo $this->element('loginform');?>
			<?php if($this->name =='Posts'):?>
	  <?php echo $this->element('postcat');?>
	  <?php endif ?>
	   <?php echo $this->element('online');?>
</section>

 <?php if($this->name =='Posts'):?>

<section id="rightcolumn"> <?php echo $this->element('commentswidget');?></div><?php endif ?>   </section >


<div id="dialog">
        <?php echo $this->element('popup');?></div>
		<footer>

                  </footer>

</div>


</body>
</html>