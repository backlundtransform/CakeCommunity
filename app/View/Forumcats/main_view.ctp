<br />

<?php
	    
	echo $this->Html->link(__('New Topic'), array('controller' => 'thread', 'action' => 'add'), array('Class' => 'Buttons'));
 


 ?>
  <span class='forumlinks'>
 

	    
[<?php	
   echo $this->Html->link(__('Featured Threads'), array('controller' => 'thread', 'action' => 'featured'));
  echo " &#149  ";
echo $this->Html->link(__('All Threads '), array('controller' => 'thread', 'action' => 'index'));

 


 ?>]
 
 </span><br />  <br />     <div class="tables"> New Threads</div>
  
  	<table cellspacing=0 style="width:100%;">
	<tr >
		
			<th class="threadtop"><?php echo $this->Paginator->sort('title'); ?></th>
			   <th class="threadtop"><?php echo $this->Paginator->sort('Replies'); ?></th>
                         <th class="threadtop"><?php echo $this->Paginator->sort('views'); ?></th>
                         <th class="threadtop"><?php echo $this->Paginator->sort('User.username', 'Started by'); ?></th>
                          <th class="threadtop" style="padding-left:50px; padding-right:50px !important;" ><?php echo $this->Paginator->sort('update', 'Updates'); ?></th>



	</tr>
	<?php if (!empty($Forumcat)): ?>

	<?php foreach ($Forumcat as $key => $thread): ?>
		<tr>

		<td class="thread">
                	<ul class="popup">
<li><?php
          if($thread['Thread']['Locked'] && $thread['Thread']['Sticky']){
          echo $this->Html->image("/img/locked.png", array('escape' => false));
           echo $this->Html->image("/img/pinned.gif", array('escape' => false));

          }elseif($thread['Thread']['Sticky']){
          echo $this->Html->image("/img/pinned.gif", array('escape' => false));
          }elseif($thread['Thread']['Locked']){
          echo $this->Html->image("/img/locked.png", array('escape' => false));
          }else{
            echo $this->Html->image("/img/post.gif", array('escape' => false));
                                          }?> <b><?php echo $this->Html->link($thread['Thread']['title'], array('action' => 'view', $thread['Thread']['id'])); ?></b>

              <span class="content">  <div class="cMessage">Message: <?php echo 1; ?> | Added: <?php echo $this->Time->timeAgoInWords($thread['Thread']['created']);?><div class="cname"><br><?php
                        echo $this->Html->image($thread['User']['image_url'], array('alt' => 'Avatar' , 'width' => '60px'));?>
<br>
<?php echo $this->Html->link($thread['User']['username'], array('controller' => 'users', 'action' => 'view', $thread['User']['id'])); ?>
</div>
<div class="cinfo">
<br>
<?php echo $thread['User']['roles'];?>
<br>Messages: <?php echo $thread['User']['Messages'];?><br>
<?php if($thread['User']['online']):?>Online<?php else:?>
                    Offline
                         <?php endif?>
</div>
<div class="cpost"><?php echo $thread['Thread']['content']; ?> </div> <br>
</div>
              </span>
              </li> 

	<?php if($thread['Thread']['Replies'] > 0 && $thread['Thread']['Replies'] < 75):?>
		[<?php
for ($i=1; $i<=ceil($thread['Thread']['Replies']/15)+1; $i++)
  {
  	if($i>1){echo '|';}
  echo $this->Html->link($i, array('action' => 'view', $thread['Thread']['id'],  "page" => $i ));
  }
?>]

<?php elseif($thread['Thread']['Replies'] > 90): ?>


[<?php

 echo $this->Html->link(1, array('action' => 'view', $thread['Thread']['id'],  "page" => 1 ));
 echo '|';
 echo $this->Html->link(2, array('action' => 'view', $thread['Thread']['id'],  "page" => 2 )); 
 echo '|';
  echo $this->Html->link(3, array('action' => 'view', $thread['Thread']['id'],  "page" => 3 ));

?>...<?php
for ($i=ceil($thread['Thread']['Replies']/15)-2; $i<=ceil($thread['Thread']['Replies']/15); $i++)
  {
  	
	if($i>ceil($thread['Thread']['Replies']/15)-2){echo '|';}
  echo $this->Html->link((int)$i, array('action' => 'view', $thread['Thread']['id'],  "page" => (int)$i ));
  }
?>]
		
<?php endif; ?>   </ul>



		</td>
                         <td class="thread">	<?php echo $thread['Thread']['Replies']; ?></td> 
                        
                        <td class="thread">	<?php echo $thread['Thread']['views']; ?></td>
		<td class="thread"><?php echo $this->Html->link($thread['User']['username'], array('controller' => 'users', 'action' => 'view', $thread['User']['id'])); ?></td>
		<td class="thread">
                
                       	<?php $lastpost = $this->requestAction('Threads/view/'.$thread['Thread']['id']);?>
                
                <ul class="popup">
<li> <?php echo   $this->Html->link($this->Time->timeAgoInWords($thread['Thread']['update']), array('action' => 'view', $thread['Thread']['id'],  "page" => floor($thread['Thread']['Replies']/15 ), '#' => 'post'), array('title'=>'go to last post'));?>       
<span class="content2">  <?php if(!empty($lastpost)):?><div class="cMessage">Message: <?php echo $thread['Thread']['Replies']; ?> | Added: <?php echo $this->Time->timeAgoInWords($thread['Thread']['update']);?><div class="cname"><br><?php
                        echo $this->Html->image($lastpost[0]['User']['image_url'], array('alt' => 'Avatar' , 'width' => '60px'));?>
<br>
<?php echo $this->Html->link($lastpost[0]['User']['username'], array('controller' => 'users', 'action' => 'view', $lastpost[0]['User']['id'])); ?>
</div>
<div class="cinfo">
<br>
<?php echo $lastpost[0]['User']['roles'];?>
<br>Messages: <?php echo $lastpost[0]['User']['Messages'];?><br>
<?php if($lastpost[0]['User']['online']):?>Online<?php else:?>
                    Offline
                         <?php endif?>
</div>
<div class="cpost"><?php echo $lastpost[0]['Threadanswer']['content']; ?> </div> <br>
</div>
              <?php else: ?> 
                            <div class="cMessage">Message: <?php echo 1; ?> | Added: <?php echo $this->Time->timeAgoInWords($thread['Thread']['created']);?><div class="cname"><br><?php
                        echo $this->Html->image($thread['User']['image_url'], array('alt' => 'Avatar' , 'width' => '60px'));?>
<br>
<?php echo $this->Html->link($thread['User']['username'], array('controller' => 'users', 'action' => 'view', $thread['User']['id'])); ?>
</div>
<div class="cinfo">
<br>
<?php echo $thread['User']['roles'];?>
<br>Messages: <?php echo $thread['User']['Messages'];?><br>
<?php if($thread['User']['online']):?>Online<?php else:?>
                    Offline
                         <?php endif?>
</div>
<div class="cpost"><?php echo $thread['Thread']['content']; ?> </div>
              

<br>
</div><?php endif; ?></span>
              </li>
              </ul>

	<div align="center">by:
	
	<?php if(!empty($lastpost)):?>
	<?php echo $lastpost[0]['User']['username']; ?>
	
	<?php else: ?> 
	<?php echo $thread['User']['username'];  ?>

	<?php endif; ?> <br> </div>

		
	</tr>

<?php endforeach; ?>
	</table>
 

	
<?php endif; ?>



	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
	
		if ($this->Paginator->hasPage(2)){

			echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		
			}
	?>
	</div>
</div>  


	
