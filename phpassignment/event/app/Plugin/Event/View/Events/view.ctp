<div class="events view">
    <h2><?php  echo __('Event');?></h2>
    <dl>

        <dt><?php echo __('Event Name'); ?></dt>
        <dd>
            <?php echo h($event['Event']['eventname']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event Desc'); ?></dt>
        <dd>
            <?php echo h($event['Event']['eventdesc']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event start date'); ?></dt>
        <dd>
            <?php echo h($event['Event']['start_date']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Event End date'); ?></dt>
        <dd>
            <?php echo h($event['Event']['end_date']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Guest invited'); ?></dt>
        <dd>
            <?php echo h($event['Event']['email']); ?>
            &nbsp;
        </dd>
    </dl>
</div>

<?php $this->start('sidebar'); ?>
<li><?php echo $this->Html->link(__('Edit Event'), array('action' => 'edit', $event['Event']['id'])); ?> </li>
<?php
$curr_date=date('Y-m-d');

$start_date=$event['Event']['start_date'];
if($curr_date>=$start_date){
    echo "<b>"."event can not be deleted"."</b>";
}
else{
    ?>
<li><?php echo $this->Form->postLink(__('Delete Event'), array('action' => 'delete', $event['Event']['id']), null, __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?> </li>
<?php } ?>
<li><?php echo $this->Html->link(__('List Event'), array('action' => 'index')); ?> </li>
<li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?> </li>
<?php $this->end(); ?>
