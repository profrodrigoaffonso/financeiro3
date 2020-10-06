<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Withdrawal $withdrawal
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Withdrawal'), ['action' => 'edit', $withdrawal->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Withdrawal'), ['action' => 'delete', $withdrawal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $withdrawal->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Withdrawals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Withdrawal'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="withdrawals view content">
            <h3><?= h($withdrawal->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Bank') ?></th>
                    <td><?= $withdrawal->has('bank') ? $this->Html->link($withdrawal->bank->name, ['controller' => 'Banks', 'action' => 'view', $withdrawal->bank->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($withdrawal->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Value') ?></th>
                    <td><?= $this->Number->format($withdrawal->value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Time') ?></th>
                    <td><?= h($withdrawal->date_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($withdrawal->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($withdrawal->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
