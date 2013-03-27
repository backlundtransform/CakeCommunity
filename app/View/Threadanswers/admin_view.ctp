
     <br>

  <div class="cMessage"><div class="cname"><br><?php
                        echo $this->Html->image($threadanswer['User']['image_url'], array('alt' => 'Avatar' , 'width' => '60px'));?>
                        <br>
                       <?php  echo $this->Html->link($threadanswer['User']['username'], array('controller' => 'users', 'action' => 'view',  $threadanswer['User']['id'])); ?> </div>
                <div class="cpost" style="margin-left:130px;" ><?php echo   $threadanswer['Threadanswer']['content']; ?> </div>
                                                      <br>
						    </div>
<div>
		<br><?php echo $this->Html->link(__('List Answers'), array('controller' => 'threadanswers', 'action' => 'admin_index')); ?> </li>
		

</div>