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
            <?= $this->Html->link(__('List Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payments form content">
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Exportar') ?></legend>
                <?php
                    echo $this->Form->control('mes', ['options' => $meses, 'empty' => true]);
                    echo $this->Form->control('ano', ['options' => $anos, 'empty' => true]);
                   
                ?>
            </fieldset>
            <?= $this->Form->button(__('Exportar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
