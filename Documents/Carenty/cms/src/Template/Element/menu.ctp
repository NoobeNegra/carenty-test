<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('My profil'), ['action' => 'edit', $visiteur->id]) ?> </li>
        <li><?= $this->Html->link(__('My commennts'), ['controller' => 'Commentaire', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('My Tools'), ['controller' => 'Outils', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Add Tool'), ['controller' => 'Outils', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Browse all tools'), ['controller' => 'Outils', 'action' => 'allTools']) ?> </li>
        <li><?= $this->Html->link(__('Logout'), ['action' => 'logout']) ?> </li>
    </ul>
</nav>
