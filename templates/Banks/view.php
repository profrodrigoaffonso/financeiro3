<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bank $bank
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Bank'), ['action' => 'edit', $bank->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Bank'), ['action' => 'delete', $bank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bank->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Banks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Bank'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="banks view content">
            <h3><?= h($bank->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($bank->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($bank->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Agency') ?></th>
                    <td><?= h($bank->agency) ?></td>
                </tr>
                <tr>
                    <th><?= __('Account') ?></th>
                    <td><?= h($bank->account) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($bank->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($bank->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($bank->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Account Holder') ?></th>
                    <td><?= $bank->account_holder ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
