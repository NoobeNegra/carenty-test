<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pret $pret
 */
?>
<?php echo $this->element('menu'); ?>
<div class="prets form large-9 medium-8 columns content">
    <?= $this->Form->create($pret) ?>
    <fieldset>
        <legend><?= __('Ask to borrow').' '.$tool->nom ?></legend>
        <?php
            echo $this->Form->control('debut');
            echo $this->Form->control('fin');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
