<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;

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
        $this->loadModel('Visiteurs');
        $visiteur = $this->Visiteurs->get($this->Auth->user('id'));
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
        
        $dateRequestedStart = new Date(strtotime($this->request->getData('debut.year').'-'.$this->request->getData('debut.month').'-'.$this->request->getData('debut.day')));
        $dateRequestedEnd = new Date(strtotime($this->request->getData('fin.year').'-'.$this->request->getData('fin.month').'-'.$this->request->getData('fin.day')));
        
        if ($dateRequestedEnd > $dateRequestedStart){
            $listePrets = $this->Prets->find()->where(['outil_id' => $tool->id, 'status >=' =>3, 'status <' => 5])->toArray();
            $overlaps = false;

            foreach($listePrets as $pt){
                if ($dateRequestedStart >= $pt->debut && $dateRequestedStart <= $pt->fin){
                    $overlaps = true;
                    break;
                }
                if($dateRequestedStart <= $pt->debut && $dateRequestedEnd >= $pt->debut){
                    $overlaps = true;
                    break;
                }            
            }
            if (!$overlaps){
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
            }
            else{
                $this->Flash->error("This tool is not available for those dates");
            }
        }else{
            $this->Flash->error("Please select a valid date range");
        }
        $this->set(compact('pret', 'tool'));
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {       
        $query = $this->Prets->find('all')->where(['donneur_id' => $this->Auth->user('id')])->contain(['Receivers', 'Outils', 'StatusPrets']);
        $this->set('giver', $this->paginate($query));
        
        $query = $this->Prets->find('all')->where(['receveur_id' => $this->Auth->user('id')])->contain(['Givers', 'Outils', 'StatusPrets']);
        $this->set('receiver', $this->paginate($query));
    }
    
    public function changeStatus($id, $statut){
        $pret = $this->Prets->get($id);
        switch ($statut){
            case 'cancel':
                $pret->status = 6;
            break;
            case 'return':
                $pret->status = 4;
            break;
            case 'accept':
                $pret->status = 2;
            break;
            case 'gotpr':
                $pret->status = 3;
            break;
            case 'gotit':
                $pret->status = 5;
            break;
        }
        $this->Prets->save($pret);
        return $this->redirect(['action' => 'index']);
    }
}
