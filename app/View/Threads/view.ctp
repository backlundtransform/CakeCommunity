
     <br> <?php $this->set('title_for_layout', $thread['Thread']['title']);?>




 <div class="tables"> <?php echo $thread['Thread']['title']; ?>
 </div> <?php if(!$this->Paginator->hasPrev()): ?>
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
                   
                <div class="cpost"><?php echo  $thread['Thread']['content']; ?> </div>  <div class="commentadmin">

						   
						          
                                                   <?php

                      if ($current_user['username']==$thread['User']['username'] || $current_user['roles'] == 'admin'){
                      	echo $this->Html->link($this->Html->image('p_edit.gif'), array('controller' => 'threads', 'action' => 'edit', $thread['Thread']['id']), array('escape' => false));
					  }

						   ?>   <?php



	if ($current_user['roles'] == 'admin') {
	    
	  echo $this->Html->link($this->Html->image('p_delete.gif'), array('controller' => 'threadanswers', 'action' => 'delete', $thread['Thread']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $thread['Thread']['id']));
 
   	}
 
 ?>
</div>
						 
<?php if ($logged_in): ?>
          <div class="threadquote">

              <?php echo  $this->Html->link($this->Html->image('p_quote.gif'),'#post', array('class' => 'quote', 'escape' => false)); ?>
         </div>
                                                   
          <?php endif ?>
                                           
        <br>             
        </div>
	<?php endif; ?>

            <?php foreach ($paginate as $key => $thread_answer): ?>
                        <div class="cMessage">Message: <?php 
                        
                        echo ($this->params['paging']['Threadanswer']['page']-1)*15+$key+2; ?> | Added: <?php echo $this->Time->timeAgoInWords($paginate[$key]['Threadanswer']['added']);?><div class="cname"><br><?php
                        echo $this->Html->image($paginate[$key]['User']['image_url'], array('alt' => 'Avatar' , 'width' => '60px'));?>
                        <br>
                       <?php  echo $this->Html->link($paginate[$key]['User']['username'], array('controller' => 'users', 'action' => 'view', $paginate[$key]['User']['id'])); ?> 
                       </div>
                       <div class="cinfo">
                       <br>
                     
                       <?php echo $paginate[$key]['User']['roles'];?>
                       <br>Messages: <?php echo $paginate[$key]['User']['Messages'];?><br>
                         <?php  if($paginate[$key]['User']['online']):?>Online<?php  else:?>
                    Offline
                         <?php  endif?>
                       
                       </div>
                <div class="cpost" ><?php echo  $paginate[$key]['Threadanswer']['content']; ?> </div>

						   
						           <div class="commentadmin">
                                                   <?php

                      if ($current_user['username']==$paginate[$key]['User']['username'] || $current_user['roles'] == 'admin'){
                      	echo $this->Html->link($this->Html->image('p_edit.gif'), array('controller' => 'threadanswers', 'action' => 'edit', $paginate[$key]['Threadanswer']['id']), array('escape' => false));
					  }

						   ?>   <?php



	if ($current_user['roles'] == 'admin') {
	    
	  echo $this->Html->link($this->Html->image('p_delete.gif'), array('controller' => 'threadanswers', 'action' => 'delete', $paginate[$key]['Threadanswer']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $paginate[$key]['Threadanswer']['id']));
 
   	}
 
 ?>

						       </div>
<?php if ($logged_in): ?>
                                                        <div class="threadquote">

                                                                          <?php
                                                                          



                                                                           echo  $this->Html->link($this->Html->image('p_quote.gif'),'#post', array('class' => 'quote', 'escape' => false)); ?>
         </div>
                                                   
                                                   <?php endif ?>
                                           
                                              <br>   </div>


                        

            
            <?php endforeach; ?>



                 <br>   <?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php if ($this->Paginator->hasPage(2)){
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		}
	?>
	</div>   <a name="post">
<?php if ($logged_in): ?>
                 <table border="0" width="100%" cellspacing="1" cellpadding="2" class="commTable">
  
  <div id="post">

<tr><td class="commTd2" colspan="2"><?php echo $this->Form->create('Threadanswer', array(
    'url' => array('controller' => 'threadanswers', 'action' => 'add'),
             'inputDefaults' => array(
        'label' => false,
        'div' => false,


    ))); 
    
   
  ?>


	<fieldset>
		<legend><?php echo __('Add Answer'); ?></legend>


                	<?php

		echo $this->Form->input('content', array('rows' => '15', 'cols' => '100', 'class'=>'ckeditor')); 
		

	 ?>
              <div id="comment">

	<?php	echo $this->Form->input('user_id');
		echo $this->Form->input('thread_id');


	?> </div>
	</fieldset>
<div align="center"><?php echo $this->Form->end('Add Answer'); ?> </div>

        </div>
</a>
</tr></table></td></tr>
<?php else: ?>
<?php echo $this->Html->link('Login', 'javascript:{}', array('class'=>'dialog')); ?> or
<?php echo $this->Html->link(__('Register'), array('controller' => 'users', 'action' => 'add')); ?>
 to leave a comment
<?php endif; ?>

</tr></table></td></tr>

</div>      
