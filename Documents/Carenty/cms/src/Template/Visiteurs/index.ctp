<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Visiteur[]|\Cake\Collection\CollectionInterface $visiteurs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visiteur'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Commentaire'), ['controller' => 'Commentaire', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Commentaire'), ['controller' => 'Commentaire', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Outils'), ['controller' => 'Outils', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Outil'), ['controller' => 'Outils', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visiteurs index large-9 medium-8 columns content">
    <h3><?= __('Visiteurs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prenom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('source') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visiteurs as $visiteur): ?>
            <tr>
                <td><?= $this->Number->format($visiteur->id) ?></td>
                <td><?= h($visiteur->nom) ?></td>
                <td><?= h($visiteur->prenom) ?></td>
                <td><?= h($visiteur->email) ?></td>
                <td><?= h($visiteur->password) ?></td>
                <td><?= h($visiteur->source) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visiteur->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visiteur->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visiteur->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visiteur->id)]) ?>
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
