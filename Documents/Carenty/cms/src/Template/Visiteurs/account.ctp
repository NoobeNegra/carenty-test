<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Visiteur $visiteur
 */
?>
<?php echo $this->element('menu'); ?>
<div class="visiteurs view large-9 medium-8 columns content">
    <h3><?= h($visiteur->nom).' '.h($visiteur->prenom)?></h3>
</div>
