<?php
$this->assign('title', __('tickets'));
$this->assign('description', '');
$this->assign('content_title', __('tickets'));
?>


<div class="box box-primary">
<div class="box-body">
<div class="box-body no-padding table-responsive">

        <table class="table table-hover table-striped">        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
            </tr>
        </thead>
<tbody>
    <?php foreach ($tickets as $ticket): ?>
    <tr>
        <td><?= $this->Number->format($ticket->id) ?></td>
        <td><?php echo $ticket->title; ?></td>
        <td><?= h($ticket->status) ?></td>
        <td><?= h($ticket->created) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $ticket->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ticket->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ticket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticket->id)]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
 </table>
 </div>
 </div>
</div>
<ul class="pagination">
<!-- Shows the previous link -->
<?php
if ($this->Paginator->hasPrev()) {
    echo $this->Paginator->prev('«', array('tag' => 'li'), null,
        array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
}

?>
<!-- Shows the page numbers -->
<?php //echo $this->Paginator->numbers();    ?>
<?php
echo $this->Paginator->numbers(array(
    'modulus' => 4,
    'separator' => '',
    'ellipsis' => '<li><a>...</a></li>',
    'tag' => 'li',
    'currentTag' => 'a',
    'first' => 2,
    'last' => 2
));

?>
<!-- Shows the next link -->
<?php
if ($this->Paginator->hasNext()) {
    echo $this->Paginator->next('»', array('tag' => 'li'), null,
        array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
}

?>
</ul>
<?php $this->start('scriptBottom'); ?>

<?php $this->end(); ?>
