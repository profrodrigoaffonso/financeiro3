<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Withdrawal $withdrawal
 */
?>
<div class="row">

    <div class="column-responsive">
        <div class="withdrawals form content">
            <?= $this->Form->create($withdrawal) ?>
            <fieldset>
                <legend><?= __('Saque') ?></legend>
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
