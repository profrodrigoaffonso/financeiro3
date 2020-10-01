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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bank->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bank->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Banks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="banks form content">
            <?= $this->Form->create($bank) ?>
            <fieldset>
                <legend><?= __('Edit Bank') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('code');
                    echo $this->Form->control('agency');
                    echo $this->Form->control('account');
                    echo $this->Form->control('account_holder');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
