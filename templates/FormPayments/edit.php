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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $formPayment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $formPayment->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Form Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="formPayments form content">
            <?= $this->Form->create($formPayment) ?>
            <fieldset>
                <legend><?= __('Edit Form Payment') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
