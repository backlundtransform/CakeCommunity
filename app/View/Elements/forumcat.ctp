


<div class='tables'>Categories</div>
        <div class='innertube'>  <?php $Categorylist = $this->requestAction('forumcats/index');

        
        ?>




	<?php foreach($Categorylist as $key=>$value): ?>

                <?php if ($value['Forumcat']['parent_id']==0): ?>
                 <?php if ($key!=0): ?></div> <?php endif ?>

                              
<br>             <input name="viewmenu" class="c_p" value=<?php echo $value['Forumcat']['name']; ?> type="submit"><div class="viewmenu">

	 <?php
            $parent=$value['Forumcat']['id'];

         endif ?>


	          <?php if (isset($parent)==$value['Forumcat']['parent_id']): ?>

	 	<?php echo $this->Html->image('cat_arrow.png'); ?><?php echo $this->Html->link($value['Forumcat']['name'], array('controller' => 'forumcats', 'action' => 'view', 'admin' => false, $value['Forumcat']['id'])); ?>  <br>

	        <?php endif ?>



<?php endforeach; ?>


	<p>

	</div></div>



