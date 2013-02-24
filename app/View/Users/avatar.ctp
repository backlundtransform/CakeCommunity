   <?php echo $this->Form->create('User', array('type' => 'file'));?>
    <fieldset>
  <?php echo $this->Form->input('image_url', array('type' => 'file'));?>
    </fieldset>
<?php echo $this->Form->end('Submit');?>