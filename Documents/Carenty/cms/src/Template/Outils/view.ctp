<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Outil $outil
 */
?>
<?php echo $this->element('toolmenu'); ?>
<div class="outils view large-9 medium-8 columns content">
    <h3><?= h($outil->nom) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($outil->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type Disponibilite') ?></th>
            <td><?= $outil->has('type_disponibilite') ? $outil->type_disponibilite->id : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modele') ?></th>
            <td><?= h($outil->modele) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nro Serie') ?></th>
            <td><?= h($outil->nro_serie) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Presentation') ?></h4>
        <?= $this->Text->autoParagraph(h($outil->presentation)); ?>
    </div>
</div>
