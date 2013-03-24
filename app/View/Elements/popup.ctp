<div id="dialog"><div class="hidden"><br><br><?php 


      echo $this->Form->create('User', array('action' => 'login', 'admin'=>false));
      echo $this->Form->input('name');
      echo $this->Form->input('password');?>
    <br><div align="center"><?php echo $this->Form->end('login'); ?></div>

        </div>
     </div>