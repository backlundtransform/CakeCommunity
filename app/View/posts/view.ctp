
      <?php $this->set('title_for_layout', $post['Post']['title']);?>


<div class="eBlock" style="padding: 3px;" border="0" cellpadding="0" cellspacing="0" width="100%">

 <div class="eTitle" style="text-align: left;"> <?php echo h($post['Post']['title']); ?>
 </div><div class="eMessage" style="text-align: left; clear: both; padding-top: 2px; padding-bottom: 2px;">
      <?php echo $post['Post']['content']; ?>
 <div class="eDetails" style="clear: both;">
Views: <?php echo $post['Post']['views']; ?> | Added by: <?php echo $this->Html->link($post['User']['name'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?> | Creation time:   <?php echo $post['Post']['created']; ?>



</div></div>   </div>




		<?php if (!empty($post['Comment']) ): ?>

                
            <?php foreach ($paginate as $key => $comment): ?>
                        <div class="cMessage"><div class="cinfo"><br><?php 
                        echo $this->Html->image($paginate[$key]['User']['image_url'], array('alt' => 'Avatar' , 'width' => '60px'));?>
                        <br>
                       <?php  echo $this->Html->link($paginate[$key]['User']['username'], array('controller' => 'users', 'action' => 'view', $paginate[$key]['User']['id'])); ?> </div>
                <div class="cpost" style="margin-left:130px;" ><?php echo  $paginate[$key]['Comment']['content']; ?> </div>

						   
						           <div class="commentadmin">
                                                   <?php

                      if ($current_user['username']==$paginate[$key]['User']['username'] || $current_user['roles'] == 'admin'){
                      	echo $this->Html->link($this->Html->image('p_edit.gif'), array('controller' => 'comments', 'action' => 'edit', $paginate[$key]['Comment']['id']), array('escape' => false));
					  }

						   ?>   <?php



	if ($current_user['roles'] == 'admin') {
	    
	  echo $this->Html->link($this->Html->image('p_delete.gif'), array('controller' => 'comments', 'action' => 'delete', $paginate[$key]['Comment']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $paginate[$key]['Comment']['id']));
 
   	}
 
 ?>

						       </div>

                                                        <div class="quote">

                                                                          <?php
                                                                          

                                                                          

                                                                           echo  $this->Html->link($this->Html->image('p_quote.gif'),'#post', array('class' => 'quote', 'escape' => false)); ?>

                                                    </div>
                                                 </div>


                        

            
            <?php endforeach; ?>

        <?php else: ?>
        <p>No comments...</p>
        <?php endif; ?>
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
	</div>
<?php if ($logged_in): ?>
                 <table border="0" width="100%" cellspacing="1" cellpadding="2" class="commTable">
     <a name="post">
  <div id="post">

<tr><td class="commTd2" colspan="2"><?php echo $this->Form->create('Comment', array(
    'url' => array('controller' => 'comments', 'action' => 'add'),
             'inputDefaults' => array(
        'label' => false,
        'div' => false,


    ))); 
    
   
  ?>
    
    
    
    

    
    
    
    
    
    
    
    
	<fieldset>
		<legend><?php echo __('Add Comment'); ?></legend>


                	<?php

		echo $this->Form->input('content', array('rows' => '15', 'cols' => '100', 'class'=>'ckeditor')); 
		

	 ?>

		<div id="comment">
	<?php	echo $this->Form->input('user_id');
		echo $this->Form->input('post_id');


	?></div>
	</fieldset>
<div align="center"><?php echo $this->Form->end('Add Comment'); ?> </div>

        </div>
</a>
</tr></table></td></tr>
<?php else: ?>
<?php echo $this->Html->link('Login', array('controller'=>'users', 'action'=>'login')); ?> or
<?php echo $this->Html->link(__('Register'), array('controller' => 'users', 'action' => 'add')); ?>
 to leave a comment
<?php endif; ?>

</tr></table></td></tr>

</div>      
