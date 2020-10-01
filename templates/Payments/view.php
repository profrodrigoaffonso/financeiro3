<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Payment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payments view content">
            <h3><?= h($payment->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $payment->has('category') ? $this->Html->link($payment->category->name, ['controller' => 'Categories', 'action' => 'view', $payment->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Form Payment') ?></th>
                    <td><?= $payment->has('form_payment') ? $this->Html->link($payment->form_payment->name, ['controller' => 'FormPayments', 'action' => 'view', $payment->form_payment->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Obs') ?></th>
                    <td><?= h($payment->obs) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($payment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Value') ?></th>
                    <td><?= $this->Number->format($payment->value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Time') ?></th>
                    <td><?= h($payment->date_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($payment->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($payment->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
