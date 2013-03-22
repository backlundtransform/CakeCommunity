
<div class='tables'>Recent Comments</div>
        <div class='innertube'>  <?php $comments = $this->requestAction('Comments/widget');?>



	<?php foreach($comments as $key=>$comment): ?>
                          <br>

			<?php echo $this->Html->link($comment['User']['username'], array('controller' => 'users', 'action' => 'view', $comment['User']['id'], 'admin'=>false)); ?> made a comment on :

			<?php echo $this->Html->link($comment['Post']['title'], array('controller' => 'posts', 'action' => 'view', $comment['Post']['id'], 'admin'=>false)); ?>
 <?php echo $this->Time->timeAgoInWords($comment['Comment']['added']);?>

                         <br>  <?php if($key === 5):?>
       <div class="view">
   <?php endif?>
                         
                         
                          <?php if($key === 9):?>


    
    
      </div >
      
<input type="submit" name="view" value ='View more' class="Button">
    
    
    
     <?php
          break;
     
      endif?>

<?php endforeach; ?>


	<p>

	</div>
</div>
<br>           </div>