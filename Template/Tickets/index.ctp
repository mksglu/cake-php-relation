<?php
$this->assign('title', __('tickets'));
$this->assign('description', '');
$this->assign('content_title', __('tickets'));
?>


<div class="box box-primary">
<div class="box-body">

    <?= $this->Form->create($tickets); ?>

    <?=
    $this->Form->input('message', [
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
