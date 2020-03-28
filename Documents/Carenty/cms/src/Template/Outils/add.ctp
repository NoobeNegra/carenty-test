<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Outil $outil
 */
?>
<?php echo $this->element('toolmenu'); ?>
<div class="outils form large-9 medium-8 columns content">
    <?= $this->Form->create($outil) ?>
    <fieldset>
        <legend><?= __('Add Tool') ?></legend>
        <?php
            echo $this->Form->control('nom');
            echo $this->Form->control('disponibilite', ['options' => $types]);
            echo $this->Form->control('modele');
            echo $this->Form->control('nro_serie');
            echo $this->Form->control('presentation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
