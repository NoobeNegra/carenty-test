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
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $commentaire = $this->Commentaire->newEntity();
        if ($this->request->is('post')) {
            $commentaire = $this->Commentaire->patchEntity($commentaire, $this->request->getData());
            $commentaire->visiteur_id = $this->Auth->user('id');
            $commentaire->date = date('Y-m-d H:i:s');
            $commentaire->object_id = $this->request->getData('object_id');
            if ($this->Commentaire->save($commentaire)) {
                $this->Flash->success(__('The commentaire has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The commentaire could not be saved. Please, try again.'));
        }
        $this->set(compact('commentaire'));
    }
}
