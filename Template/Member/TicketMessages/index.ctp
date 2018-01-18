<?php
$this->assign('title', __('TicketMessages'));
$this->assign('description', '');
$this->assign('content_title', __('TicketMessages'));
?>


<div class="box box-primary">
<div class="box-body">
<?= $tickets; ?>
    <?= $this->Form->create($ticketMessages); ?>

  <?=
    $this->Form->input('ticket_message.message', [
        'label' => __('Message'),
        'class' => 'form-control',
        'type' => 'text'
    ]);
    ?>

    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']); ?>

    <?= $this->Form->end(); ?>
</div>
</div>

<?php $this->start('scriptBottom'); ?>

<?php $this->end(); ?>
