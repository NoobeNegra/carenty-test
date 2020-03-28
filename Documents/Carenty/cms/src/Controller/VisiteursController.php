<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Visiteurs Controller
 *
 *
 * @method \App\Model\Entity\Visiteur[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VisiteursController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow('add');
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visiteur = $this->Visiteurs->newEntity();
        if ($this->request->is('post')) {
            $visiteur = $this->Visiteurs->patchEntity($visiteur, $this->request->getData());
            $visiteur->password = (new DefaultPasswordHasher())->hash($this->request->getData('password'));
            if ($this->Visiteurs->save($visiteur)) {
                $this->Auth->setUser($visiteur);
                return $this->redirect(['action' => 'account']);
            }
            $this->Flash->error(__('The visiteur could not be saved. Please, try again.'));
        }
        $this->set(compact('visiteur'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Visiteur id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visiteur = $this->Visiteurs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visiteur = $this->Visiteurs->patchEntity($visiteur, $this->request->getData());
            if ($this->Visiteurs->save($visiteur)) {
                $this->Flash->success(__('The visiteur has been saved.'));

               return $this->redirect(['action' => 'account']);
            }
            $this->Flash->error(__('The visiteur could not be saved. Please, try again.'));
        }
        $this->set(compact('visiteur'));
    }
    
    public function login(){
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['action' => 'account']);
            } else {
                $this->Flash->error(__('Username or password is incorrect'));
            }
        }
    }
    
    public function account(){
        $visiteur = $this->Visiteurs->get($this->Auth->user('id'), [
            'contain' => ['Outils','Commentaire'],
        ]);

        $this->set('visiteur', $visiteur);
    }
}
