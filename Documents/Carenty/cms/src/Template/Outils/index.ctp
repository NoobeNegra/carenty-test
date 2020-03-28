<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Outil[]|\Cake\Collection\CollectionInterface $outils
 */
?>
<?php echo $this->element('menu'); ?>
<div class="outils index large-9 medium-8 columns content">
    <h3><?= __('My Tools') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_disponibilite_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modele') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nro_serie') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($outils as $outil): ?>
            <tr>
                <td><?= h($outil->nom) ?></td>
                <td><?= $outil->has('type_disponibilite') ? $outil->type_disponibilite->nom : '' ?></td>
                <td><?= h($outil->modele) ?></td>
                <td><?= h($outil->nro_serie) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $outil->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $outil->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $outil->id], ['confirm' => __('Are you sure you want to delete # {0}?', $outil->nom)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
