<?php 
    foreach ($tickets_messages as $tickets_message) {
        if($tickets_message->head == 1) { ?>
            <span style="color:red"><?php echo $tickets_message->message; ?></span>
       <?php }else{ ?>
             <span style="color:blue"><?php echo $tickets_message->message; ?></span>
       <?php } ?>
    <?php } ?>
 
<div class="box box-primary">
<div class="box-body">
     <?= $this->Form->create($tickets_messagesForm); ?>

    <?=
    $this->Form->input('message', [
        'label' => __('Message'),
        'class' => 'form-control',
        'type' => 'text'
    ]);    
  
    ?>

    <?= $this->Form->button(__('Yanıtla'), ['class' => 'btn btn-primary']); ?>

    <?= $this->Form->end(); ?>
</div>
</div>
