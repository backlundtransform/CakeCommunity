  <br />

<?php
	    
	echo $this->Html->link(__('New Topic'), array('action' => 'add'), array('Class' => 'Buttons'));
 


 ?>
  <br />  <br />     <div class="tables"> New Threads</div>
  
  	<table cellspacing=0>
	<tr >
		
			<th class="threadtop"><?php echo $this->Paginator->sort('title'); ?></th>
			   <th class="threadtop"><?php echo $this->Paginator->sort('Replies'); ?></th>
                         <th class="threadtop"><?php echo $this->Paginator->sort('views'); ?></th>
                         <th class="threadtop"><?php echo $this->Paginator->sort('User.username', 'Started by'); ?></th>
                          <th class="threadtop"><?php echo $this->Paginator->sort('update', 'Updates'); ?></th>


			
	</tr>
		<?php foreach ($threads as $thread): ?>
	<tr>

		<td class="thread">	 <b><?php echo $this->Html->link($thread['Thread']['title'], array('action' => 'view', $thread['Thread']['id']),  array('class' => 'trigger')); ?></b>
	<?php if($thread['Thread']['Replies'] > 0 && $thread['Thread']['Replies'] < 75):?>
		[<?php
for ($i=1; $i<=(int)$thread['Thread']['Replies']/15+1; $i++)
  {
  	if($i>1){echo '|';}
  echo $this->Html->link($i, array('action' => 'view', $thread['Thread']['id'],  "page" => $i ));
  }
?>]

<?php elseif($thread['Thread']['Replies'] > 75): ?>	


[<?php

 echo $this->Html->link(1, array('action' => 'view', $thread['Thread']['id'],  "page" => 1 ));
 echo '|';
 echo $this->Html->link(2, array('action' => 'view', $thread['Thread']['id'],  "page" => 2 ));

?>...<?php
for ($i=(int)$thread['Thread']['Replies']/15-2; $i<=(int)$thread['Thread']['Replies']/15; $i++)
  {
  	
	if($i>(int)$thread['Thread']['Replies']/15-2){echo '|';}
  echo $this->Html->link((int)$i, array('action' => 'view', $thread['Thread']['id'],  "page" => (int)$i ));
  }
?>]
		
<?php endif; ?>	

<br>   <div class="popup">
      <div class="cMessage">Message: <?php echo 1; ?> | Added: <?php echo $this->Time->timeAgoInWords($thread['Thread']['created']);?><div class="cname"><br><?php
                        echo $this->Html->image($thread['User']['image_url'], array('alt' => 'Avatar' , 'width' => '60px'));?>
                        <br>
                       <?php  echo $this->Html->link($thread['User']['username'], array('controller' => 'users', 'action' => 'view', $thread['User']['id'])); ?> 
                       </div>
                       <div class="cinfo">
                       <br>   
                       <?php echo $thread['User']['roles'];?>
                       <br>Messages: <?php echo $thread['User']['Messages'];?><br>
                         <?php  if($thread['User']['online']):?>Online<?php  else:?>
                    Offline
                         <?php  endif?>
                       </div>
                   
                <div class="cpost"><?php echo  $thread['Thread']['content']; ?> </div>   <br>             
        </div>
    </div>

		</td>
                         <td class="thread">	<?php echo $thread['Thread']['Replies']; ?></td> 
                        
                        <td class="thread">	<?php echo $thread['Thread']['views']; ?></td>
		<td class="thread"><?php echo $this->Html->link($thread['User']['username'], array('controller' => 'users', 'action' => 'view', $thread['User']['id'])); ?></td>
		<td class="thread"><?php echo   $this->Html->link($this->Time->timeAgoInWords($thread['Thread']['update']), array('action' => 'view', $thread['Thread']['id'],  "page" => floor($thread['Thread']['Replies']/15 ), '#' => 'post'), array('title'=>'go to last post'));?>
		<?php $lastpost = $this->requestAction('Threads/view/'.$thread['Thread']['id']);?>
	<br/>by: <?php 
	
	if(!empty($lastpost)){
		echo $lastpost[0]['User']['username']; 
	
	}else{
	echo $thread['User']['username'];
	}

?><br>  

		
	</tr>

<?php endforeach; ?>
	</table>
 

	




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


