<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Outil $outil
 */
?>
<?php echo $this->element('menu'); ?>
<div class="outils form large-9 medium-8 columns content">
    <?= $this->Form->create($outil) ?>
    <fieldset>
        <legend><?= __('Edit Tool') ?></legend>
        <?php
            echo $this->Form->control('nom');
            echo $this->Form->control('type_disponibilite_id', ['options' => $types]);
            echo $this->Form->control('modele');
            echo $this->Form->control('nro_serie');
            echo $this->Form->control('presentation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
