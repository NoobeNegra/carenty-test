<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Outil[]|\Cake\Collection\CollectionInterface $outils
 */
?>
<?php echo $this->element('menu'); ?>
<div class="outils index large-9 medium-8 columns content">
    <h3><?= __('Loans I asked') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= __('Tool') ?></th>
                <th scope="col"><?= __('Giver') ?></th>
                <th scope="col"><?= __('From') ?></th>
                <th scope="col"><?= __('To') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($receiver as $prets): ?>
            <tr>
                <td><?= h($prets->outil->nom) ?></td>
                <td><?= h($prets->Giver->nom.' '.$prets->Giver->prenom) ?></td>
                <td><?= $prets->debut->i18nFormat() ?></td>
                <td><?= $prets->fin->i18nFormat() ?></td>
                <td><?=  h($prets->status_pret->nom) ?></td>
                <td class="actions">
                    <?php if ($prets->status < 3){
                        echo $this->Html->link(__('Cancel'), ['action' => 'changeStatus', $prets->id, 'cancel'], ['confirm' => __('Are you sure you want to cancel this loan?')]) ;
                    } else if ($prets->status == 2) {
                        echo $this->Html->link(__('Got it!'), ['action' => 'changeStatus', $prets->id, 'gotpr'], ['confirm' => __('Dis you received this tool?')]) ;
                    } else if ($prets->status == 6) {
                        echo 'Canceled' ;
                    } else if ($prets->status == 4 || $prets->status == 5) {
                        echo 'Returned' ;
                    } else {
                        echo $this->Html->link(__('Returned'), ['action' => 'changeStatus', $prets->id, 'return'], ['confirm' => __('Are you sure you want to mark as returned this tool?')]) ;
                    }?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h3><?= __('People asked me for') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= __('Tool') ?></th>
                <th scope="col"><?= __('Receiver') ?></th>
                <th scope="col"><?= __('From') ?></th>
                <th scope="col"><?= __('To') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($giver as $prets): ?>
            <tr>
                <td><?= h($prets->outil->nom) ?></td>
                <td><?= h($prets->Receiver->nom.' '.$prets->Receiver->prenom) ?></td>
                <td><?= $prets->debut->i18nFormat() ?></td>
                <td><?= $prets->fin->i18nFormat() ?></td>
                <td><?=  h($prets->status_pret->nom) ?></td>
                <td class="actions">
                    <?php if ($prets->status == 1){
                        echo $this->Html->link(__('Accept'), ['action' => 'changeStatus', $prets->id, 'accept'], ['confirm' => __('Are you sure you want to accept this loan? Other loans of this tool from this time frame will be rejected')]) ;
                    } else if ($prets->status == 2){
                        echo $this->Html->link(__('Cancel'), ['action' => 'changeStatus', $prets->id, 'cancel'], ['confirm' => __('Are you sure you want to cancel this loan?')]) ;
                    } else if ($prets->status == 4){
                        echo $this->Html->link(__('Got it!'), ['action' => 'changeStatus', $prets->id, 'gotit'], ['confirm' => __('Are you sure you want to mark this tool as returned?')]) ;
                    }else {
                        echo 'Nothing';
                    }?>
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
