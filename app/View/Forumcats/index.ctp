

<?php if (!empty($Categorylist)): ?>
	<?php foreach($Categorylist as $key=>$value): ?>

                <?php if ($value['Forumcat']['parent_id']==0): ?>

                              <br><br>
		<div class="tables">	<?php echo $this->Html->link($value['Forumcat']['name'], array('action' => 'main_view', 'admin' => false, $value['Forumcat']['id'])); ?>

                 </div>
                        <table class="threadtop" align="right"><tr>
  <td>      Forum   </td> <td width="25%">      Threads   </td>
                                    </tr>


                              </table>
       	 <?php
            $parent=$value['Forumcat']['id'];
         
         endif ?>









          <?php if ($parent==$value['Forumcat']['parent_id']): ?>
                       <table class="thread" ><tr>
  <td>

                            <?php echo $this->Html->link($value['Forumcat']['name'], array('action' => 'view', 'admin' => false, $value['Forumcat']['id'])); ?>
                                      <br>
                                     
                                      </td>  <td width="30%">   <?php $Forumcat = $this->requestAction('forumcats/view/'. $value['Forumcat']['id'].'');


       ?>
              <?php if (!empty($Forumcat)): ?>
              <?php echo count($Forumcat['Thread']['id'] );  ?>
              <?php else: ?>  0
                 <?php endif ?>

       
         </td>
                                    </tr>


                              </table>
                            
		        <?php endif ?>



<?php endforeach; ?>
<?php endif ?>


	<p>


<br>

