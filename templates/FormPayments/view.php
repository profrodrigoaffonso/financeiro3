<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FormPayment $formPayment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Form Payment'), ['action' => 'edit', $formPayment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Form Payment'), ['action' => 'delete', $formPayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formPayment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Form Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Form Payment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="formPayments view content">
            <h3><?= h($formPayment->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($formPayment->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($formPayment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($formPayment->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($formPayment->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
