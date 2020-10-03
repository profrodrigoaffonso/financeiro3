<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
<div class="row">
   
    <div class="column-responsive ">
        <div class="payments form content">
            <?= $this->Form->create($payment) ?>
            <fieldset>
                <legend><?= __('Add Payment') ?></legend>
                <?php
                    echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true, 'required']);
                    echo $this->Form->control('form_payment_id', ['options' => $formPayments, 'empty' => true, 'required']);
                    echo $this->Form->control('value', ['type' => 'text', 'required']);
                    echo $this->Form->control('date_time', ['value' => date('Y-m-d H:i:00')]);
                    echo $this->Form->control('obs');
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