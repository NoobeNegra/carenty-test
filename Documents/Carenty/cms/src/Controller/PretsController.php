<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Prets Controller
 *
 *
 * @method \App\Model\Entity\Pret[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PretsController extends AppController
{
    public function beforeRender(\Cake\Event\Event $event) {
        parent::beforeRender($event);
        $visiteur = $this->Prets->Visiteurs->get($this->Auth->user('id'));
        $this->set('visiteur', $visiteur);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($toolId)
    {
        $tool = $this->Prets->Outils->get($toolId);
        $pret = $this->Prets->newEntity();
        if ($this->request->is('post')) {
            $pret = $this->Prets->patchEntity($pret, $this->request->getData());
            $pret->donneur_id = $tool->visiteur_id;
            $pret->receveur_id = $this->Auth->user('id');
            $pret->outil_id = $toolId;
            if ($this->Prets->save($pret)) {
                $this->Flash->success(__('The pret has been saved.'));

                return $this->redirect(['controller'=>'Visiteurs','action' => 'account']);
            }
            $this->Flash->error(__('The pret could not be saved. Please, try again.'));
        }
        $this->set(compact('pret', 'tool'));
    }
}
