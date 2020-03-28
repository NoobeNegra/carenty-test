<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Outil $outil
 */
?>
<?php echo $this->element('menu'); ?>
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
    <div class="row">
        <?php foreach ($comments as $comment): ?>
            <h4><?= $comment->visiteur->prenom.' '.$comment->visiteur->nom.' says '; ?></h4>
         <?php   echo $this->Text->autoParagraph(h($outil->presentation)).'<br/>'.$this->Time->nice($comment->date); 
        endforeach;
        ?>
    </div>
    <?php if ($commentEnabled):?>
        <?= $this->Form->create(NULL,['url' => ['controller' => 'Commentaire','action' => 'add']]);?>
        <fieldset>
            <legend><?= __('Write a comment about this') ?></legend>
            <?php
                echo $this->Form->control('commentaire');
                echo $this->Form->hidden('modele_id',['value' => 1]);
                echo $this->Form->hidden('object_id',['value' => $outil->id]);
            ?>
        </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <?php endif;?>
</div>
