<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Outils Controller
 *
 *
 * @method \App\Model\Entity\Outil[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OutilsController extends AppController
{   
    public function beforeRender(\Cake\Event\Event $event) {
        parent::beforeRender($event);
        $visiteur = $this->Outils->Visiteurs->get($this->Auth->user('id'));

        $this->set('visiteur', $visiteur);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $query = $this->Outils->find('all')->where(['visiteur_id' => $this->Auth->user('id')]);
        $this->set('outils', $this->paginate($query));
    }

    /**
     * View method
     *
     * @param string|null $id Outil id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Commentaire');
        $outil = $this->Outils->get($id);
        $comments = $this->Commentaire->find()->where(['modele_id' => 1, 'object_id' => $id])->contain(['Visiteurs']);
        $commentEnabled = ($outil->visiteur_id == $this->Auth->user('id'))?FALSE:TRUE;
        $this->set(compact('outil', 'comments','commentEnabled'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $outil = $this->Outils->newEntity();
        if ($this->request->is('post')) {
            $outil = $this->Outils->patchEntity($outil, $this->request->getData());
            $outil->visiteur_id = $this->Auth->user('id');
            if ($this->Outils->save($outil)) {
                $this->Flash->success(__('The tool has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The outil could not be saved. Please, try again.'));
        }
        $types = $this->Outils->TypeDisponibilite->find('list');
        $this->set(compact('outil', 'types'));
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Outil id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $outil = $this->Outils->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $outil = $this->Outils->patchEntity($outil, $this->request->getData());
            if ($this->Outils->save($outil)) {
                $this->Flash->success(__('The outil has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The outil could not be saved. Please, try again.'));
        }
        $types = $this->Outils->TypeDisponibilite->find('list');
        $this->set(compact('outil', 'types'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Outil id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $outil = $this->Outils->get($id);
        if ($this->Outils->delete($outil)) {
            $this->Flash->success(__('The outil has been deleted.'));
        } else {
            $this->Flash->error(__('The outil could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function allTools(){
        $query = $this->Outils->find('all')->where(['visiteur_id !=' => $this->Auth->user('id'), 'type_disponibilite_id >' => 1]);
        $this->set('outils', $this->paginate($query));
    }
}
