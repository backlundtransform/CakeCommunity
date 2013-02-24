   <br><div class='tables'>My Inbox</div>
      <div class='inbox'> 
      

                  <br>[ Inbox | Sent |
                  
                       <?php echo $this->Html->link('Send PM ', array( 'action' => 'compose')); ?>
                  
                  | My profile ]
                  <hr>
      
      <?php

        
        foreach ($messages as $key => $message): ?>
                         <?php echo $key+1 ?>
			<?php echo $this->Html->link($message['Message']['subject'], array( 'action' => 'view', $message['Message']['id'])); ?>
		        (<?php echo $this->Html->link($message['User']['name'], array( 'controller' => 'User', 'action' => 'view', $message['User']['id'])); ?> )
                
                

                        
                          <br>
<?php endforeach; ?>   <br> </div>