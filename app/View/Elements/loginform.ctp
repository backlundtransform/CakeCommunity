


<?php if (!$logged_in): ?><div class="tables">Login</div>
    <div class="innertube"><?php 


      echo $this->Form->create('User', array('action' => 'login', 'admin'=>false));
      echo $this->Form->input('username');
      echo $this->Form->input('password');
      echo $this->Form->end('login');

      
<<<<<<< HEAD
      ?><br>
=======
      ?><br> <?php echo $this->Html->link('Login', array('controller'=>'users', 'action'=>'Login', 'admin'=> false)); ?> |
>>>>>>> c2ebab6aa96e140f8808a1c0205ec7240c356d3b
<?php echo $this->Html->link(__('Register'), array('controller' => 'users', 'action' => 'add', 'admin'=> false)); ?>


<?php else:?> <div class="tables">Logout</div>
    <div class="innertube"><br><div align='center'><?php echo $this->Html->link(' Logout ', array('controller'=>'users', 'action'=>'Logout', 'admin'=> false), array('Class' => 'Buttons')); ?>
</div><br>
<?php endif ?></div>        <br>