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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $withdrawal->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $withdrawal->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Withdrawals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="withdrawals form content">
            <?= $this->Form->create($withdrawal) ?>
            <fieldset>
                <legend><?= __('Edit Withdrawal') ?></legend>
                <?php
                    echo $this->Form->control('bank_id', ['options' => $banks, 'empty' => true]);
                    echo $this->Form->control('value');
                    echo $this->Form->control('date_time', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
