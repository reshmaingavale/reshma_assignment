<?php
//let's load up the jQuery core
//echo  $this->javascript->link('jquery-1.3.2.min', false);
echo $this->Html->css('jquery.validate.css',false);

echo $this->Html->script('jquery.validation.functions.js',false);

echo $this->Html->css('style.css',false);
echo $this->Html->script('jquery-1.3.2.js',false);
echo $this->Html->script('jquery.validate.js',false);


//and now... some file that will be specific to this view (page)

?>

<script type="text/javascript">
    /* <![CDATA[ */
    jQuery(function(){
        jQuery("#EventEventname").validate({
            expression: "if (VAL) return true; else return false;",
            message: "Please enter the Required field"
        });

        jQuery("#EventEventdesc").validate({
            expression: "if (VAL) return true; else return false;",
            message: "Please enter the Required field"
        });

        jQuery("#ValidEmail").validate({
            expression: "if (isEmailValid(VAL)) return true; else return false;",
            message: "Please enter a valid Email ID"
        });

    });
    /* ]]> */
</script>

<div class="events form">
    <?php echo $this->Form->create('Event');?>
    <fieldset>
        <legend><?php echo __('Event User'); ?></legend>
        <?php
        echo $this->Form->input('eventname', array( 'label'=>'Event Name','class' => 'required', 'minlength'=>2));
        echo " <span>Event Desc</span>";
        echo $this->Form->textarea('eventdesc',array('class' => 'required', 'minlength'=>2));
        echo $this->Form->input('start_date',array( 'label'=>'StartDate','class' => 'required'));
        echo $this->Form->input('end_date',array( 'label'=>'End Date','class' => 'required'));
        echo $this->Form->input('email',array('id'=>'ValidEmail'));
        echo "<div id='demo'></div>";
        ?>

    </fieldset>
    <?php echo $this->Form->end(__('Submit'));?>
    <?php //if(isset($_POST[''])) ?>
</div>


<?php $this->start('sidebar'); ?>
<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index'));?></li>
<?php $this->end(); ?>