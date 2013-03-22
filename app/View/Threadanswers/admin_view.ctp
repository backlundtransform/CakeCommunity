


  <div class="cMessage"><div class="cinfo"><br><?php 
                        echo $this->Html->image($comment['User']['image_url'], array('alt' => 'Avatar' , 'width' => '60px'));?>
                        <br>
                       <?php  echo $this->Html->link($comment['User']['username'], array('controller' => 'users', 'action' => 'view', $comment['User']['id'])); ?> </div>
                <div class="cpost" style="margin-left:130px;" ><?php echo  $comment['Comment']['content']; ?> </div>
                      
						    </div>
<div>
		<br><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'admin_index')); ?> </li>
		

</div>