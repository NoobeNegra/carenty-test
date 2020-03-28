<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Visiteur $visiteur
 */
?>
<?php echo $this->element('menu'); ?>
<div class="visiteurs form large-9 medium-8 columns content">
    <?= $this->Form->create($visiteur) ?>
    <fieldset>
        <legend><?= __('Edit my profil') ?></legend>
        <?php
            echo $this->Form->control('nom');
            echo $this->Form->control('prenom');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
