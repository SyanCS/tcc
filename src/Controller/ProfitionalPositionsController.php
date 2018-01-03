<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ProfitionalPositions Controller
 *
 * @property \App\Model\Table\ProfitionalPositionsTable $ProfitionalPositions
 *
 * @method \App\Model\Entity\ProfitionalPosition[] paginate($object = null, array $settings = [])
 */
class ProfitionalPositionsController extends AppController
{


    public function beforeRender(Event $event)
    {
        $action = $this->request->param('action');

        switch($action) {
            case 'edit' :
                if(isset($this->viewVars['profitionalPosition']->start_date)){ 
                    $this->viewVars['profitionalPosition']->start_date = date('d/m/Y', strtotime($this->viewVars['profitionalPosition']->start_date));
                }
                if(isset($this->viewVars['profitionalPosition']->end_date)){
                    $this->viewVars['profitionalPosition']->end_date = date('d/m/Y', strtotime($this->viewVars['profitionalPosition']->end_date));
                }
                break;
            default:
                break;
        }

        parent::beforeRender($event);
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $loggedUser = $this->Auth->user();
        $user_id = $loggedUser['id'];
        $profitionalPositions = $this->ProfitionalPositions->findByUserId($user_id,[
            'contain' => ['Users'] 
        ]);
        $profitionalPositions = $this->paginate($profitionalPositions);

        $this->set(compact('profitionalPositions'));
        $this->set('_serialize', ['profitionalPositions']);
    }

    /**
     * View method
     *
     * @param string|null $id Profitional Position id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $loggedUser = $this->Auth->user();
        $user_id = $loggedUser['id'];

        $profitionalPosition = $this->ProfitionalPositions->get($id, [
            'contain' => ['Users']
        ]);

        if($profitionalPosition->user_id != $user_id){
            $this->Flash->error(__('You cannot view this {0}.', 'Profitional Position'));
            return $this->redirect(['action' => 'index']);
        }

        $this->set('profitionalPosition', $profitionalPosition);
        $this->set('_serialize', ['profitionalPosition']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $loggedUser = $this->Auth->user();
        $user_id = $loggedUser['id'];

        $profitionalPosition = $this->ProfitionalPositions->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['user_id'] = "{$user_id}";
            $profitionalPosition = $this->ProfitionalPositions->patchEntity($profitionalPosition, $this->request->data);
            if ($this->ProfitionalPositions->save($profitionalPosition)) {
                $this->Flash->success(__('The {0} has been saved.', 'Profitional Position'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Profitional Position'));
            }
        }
        $users = $this->ProfitionalPositions->Users->find('list', ['limit' => 200]);
        $this->set(compact('profitionalPosition', 'users'));
        $this->set('_serialize', ['profitionalPosition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Profitional Position id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loggedUser = $this->Auth->user();
        $user_id = $loggedUser['id'];

        $profitionalPosition = $this->ProfitionalPositions->get($id, [
            'contain' => []
        ]);

        if($profitionalPosition->user_id != $user_id){
            $this->Flash->error(__('You cannot edit this {0}.', 'Profitional Position'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['user_id'] = "{$user_id}";
            $profitionalPosition = $this->ProfitionalPositions->patchEntity($profitionalPosition, $this->request->data);
            if ($this->ProfitionalPositions->save($profitionalPosition)) {
                $this->Flash->success(__('The {0} has been saved.', 'Profitional Position'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Profitional Position'));
            }
        }
        $users = $this->ProfitionalPositions->Users->find('list', ['limit' => 200]);
        $this->set(compact('profitionalPosition', 'users'));
        $this->set('_serialize', ['profitionalPosition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Profitional Position id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profitionalPosition = $this->ProfitionalPositions->get($id);
        if ($this->ProfitionalPositions->delete($profitionalPosition)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Profitional Position'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Profitional Position'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
