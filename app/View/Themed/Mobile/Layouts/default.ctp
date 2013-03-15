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

		echo $this->Html->css('jquery.mobile-1.3.0.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('jQuery');
		echo $this->Html->script('jquery.mobile-1.3.0/jquery.mobile-1.3.0.min');
		
		
		echo $this->Html->script('cakejs');
		echo $this->Html->script('jquery-ui-1.10.1.custom/js/jquery-ui-1.10.1.custom.min');
		
	

	        echo $this->Js->writeBuffer();
	?> 
</head>
<body>
	
			<?php echo $this->element('search');?>
 
			<?php echo $this->fetch('content'); ?>
                        





</body>
</html>
