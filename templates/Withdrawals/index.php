<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Withdrawal[]|\Cake\Collection\CollectionInterface $withdrawals
 */
?>
<div class="withdrawals index content">
    <?= $this->Html->link(__('New Withdrawal'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Withdrawals') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('bank_id') ?></th>
                    <th><?= $this->Paginator->sort('value') ?></th>
                    <th><?= $this->Paginator->sort('date_time') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($withdrawals as $withdrawal): ?>
                <tr>
                    <td><?= $this->Number->format($withdrawal->id) ?></td>
                    <td><?= $withdrawal->has('bank') ? $this->Html->link($withdrawal->bank->name, ['controller' => 'Banks', 'action' => 'view', $withdrawal->bank->id]) : '' ?></td>
                    <td><?= $this->Number->format($withdrawal->value) ?></td>
                    <td><?= h($withdrawal->date_time) ?></td>
                    <td><?= h($withdrawal->created) ?></td>
                    <td><?= h($withdrawal->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $withdrawal->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $withdrawal->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $withdrawal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $withdrawal->id)]) ?>
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
