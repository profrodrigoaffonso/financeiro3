<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FormPayment[]|\Cake\Collection\CollectionInterface $formPayments
 */
?>
<div class="formPayments index content">
    <?= $this->Html->link(__('New Form Payment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Form Payments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($formPayments as $formPayment): ?>
                <tr>
                    <td><?= $this->Number->format($formPayment->id) ?></td>
                    <td><?= h($formPayment->name) ?></td>
                    <td><?= h($formPayment->created) ?></td>
                    <td><?= h($formPayment->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $formPayment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $formPayment->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $formPayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formPayment->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
