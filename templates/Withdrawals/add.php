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
            <?= $this->Html->link(__('List Withdrawals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="withdrawals form content">
            <?= $this->Form->create($withdrawal) ?>
            <fieldset>
                <legend><?= __('Add Withdrawal') ?></legend>
                <?php
                    echo $this->Form->control('bank_id', ['options' => $banks, 'empty' => true]);
                    echo $this->Form->control('value', ['type' => 'text']);
                    echo $this->Form->control('date_time', ['value' => date('Y-m-d H:i:00'), 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?= $this->Html->script(['jquery.js', 'jquery.mask.min']) ?>
<script>
    $('#value').mask('0000,00', {reverse: true});
</script>
