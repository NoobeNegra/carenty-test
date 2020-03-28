<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Commentaire Controller
 *
 *
 * @method \App\Model\Entity\Commentaire[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CommentaireController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $commentaire = $this->paginate($this->Commentaire);

        $this->set(compact('commentaire'));
    }

    /**
     * View method
     *
     * @param string|null $id Commentaire id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $commentaire = $this->Commentaire->get($id, [
            'contain' => [],
        ]);

        $this->set('commentaire', $commentaire);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $commentaire = $this->Commentaire->newEntity();
        if ($this->request->is('post')) {
            $commentaire = $this->Commentaire->patchEntity($commentaire, $this->request->getData());
            if ($this->Commentaire->save($commentaire)) {
                $this->Flash->success(__('The commentaire has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The commentaire could not be saved. Please, try again.'));
        }
        $this->set(compact('commentaire'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Commentaire id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $commentaire = $this->Commentaire->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $commentaire = $this->Commentaire->patchEntity($commentaire, $this->request->getData());
            if ($this->Commentaire->save($commentaire)) {
                $this->Flash->success(__('The commentaire has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The commentaire could not be saved. Please, try again.'));
        }
        $this->set(compact('commentaire'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Commentaire id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $commentaire = $this->Commentaire->get($id);
        if ($this->Commentaire->delete($commentaire)) {
            $this->Flash->success(__('The commentaire has been deleted.'));
        } else {
            $this->Flash->error(__('The commentaire could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
