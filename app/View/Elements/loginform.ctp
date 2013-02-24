

<div class="tables">Login</div>
    <div class="innertube">
<?php 


      echo $this->Form->create('User', array('action' => 'login'));
      echo $this->Form->input('username');
      echo $this->Form->input('password');
      echo $this->Form->end('login');

      
      ?> </div>        <br>