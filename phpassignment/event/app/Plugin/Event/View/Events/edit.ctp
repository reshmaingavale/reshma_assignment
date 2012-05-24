<div class="events form">
    <?php echo $this->Form->create('Event');  ?>
    <fieldset>
        <legend><?php echo __('Event User'); ?></legend>
        <?php

        echo $this->Form->input('eventname');
        echo $this->Form->input('eventdesc');
        echo $this->Form->input('start_date');
        echo $this->Form->input('end_date');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit'));?>
</div>


<?php $this->start('sidebar'); ?>
<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Event.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Event.id'))); ?></li>
<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index'));?></li>
<?php $this->end(); ?>