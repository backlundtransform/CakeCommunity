   <br><div class='tables'>My Inbox</div>
      <div class='inbox'> 
      

                  <br>[ <?php echo $this->Html->link('Inbox ('. count($messages).')' , array( 'action' => 'inbox')); ?>  | Sent |
                  
                       <?php echo $this->Html->link('Send PM ', array( 'action' => 'compose')); ?>

                  |<?php echo $this->Html->link('My profile', array('controller'=>'users', 'action'=>'view', $current_user['id'],  'admin'=>false)); ?> ]
                  <hr>
      
      <?php

        
        foreach ($messages as $key => $message): ?>
                         <?php echo $key+1 ?>
			<?php echo $this->Html->link($message['Message']['subject'], array( 'action' => 'view', $message['Message']['id'])); ?>
		        (<?php echo $this->Html->link($message['User']['username'], array( 'controller' => 'User', 'action' => 'view', $message['User']['id'])); ?> )
                
                

                        
                          <br>
<?php endforeach; ?>   <br> </div>