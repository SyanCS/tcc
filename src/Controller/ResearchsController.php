<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Researchs Controller
 *
 * @property \App\Model\Table\ResearchsTable $Researchs
 *
 * @method \App\Model\Entity\Research[] paginate($object = null, array $settings = [])
 */
class ResearchsController extends AppController
{


    public function beforeRender(Event $event)
    {

        $action = $this->request->param('action');

        switch($action) {
            case 'edit' :
                if(isset($this->viewVars['research']->start_date)){ 
                    $this->viewVars['research']->start_date = date('d/m/Y', strtotime($this->viewVars['research']->start_date));
                }
                if(isset($this->viewVars['research']->end_date)){
                    $this->viewVars['research']->end_date = date('d/m/Y', strtotime($this->viewVars['research']->end_date));
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
        $researchs = $this->Researchs->findByUserId($user_id,[
            'contain' => ['Users'] 
        ]);

        $researchs = $this->paginate($researchs);

        $this->set(compact('researchs'));
        $this->set('_serialize', ['researchs']);
    }

    /**
     * View method
     *
     * @param string|null $id Research id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $research = $this->Researchs->get($id, [
            'contain' => ['Users', 'ResearchMembers']
        ]);

        $this->set('research', $research);
        $this->set('_serialize', ['research']);
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

        $research = $this->Researchs->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['user_id']  = "{$user_id}";
            $research = $this->Researchs->patchEntity($research, $this->request->data);
            $saved_research = $this->Researchs->save($research);
            if ($saved_research) {
                $this->loadModel('ResearchMembers');
                $membersList = $this->request['data']['members'];
                $warning = false;
                foreach($membersList as $member_data){

                    $member_data['research_id'] = $saved_research->id;
                    $member = $this->ResearchMembers->newEntity();
                    $member = $this->ResearchMembers->patchEntity($member, $member_data);

                    if(!$this->ResearchMembers->save($member)){
                        $warning = true;
                    }

                }
                if(!$warning){
                    $this->Flash->success(__('The {0} has been saved.', 'Research'));
                }else{
                    $this->Flash->error(__('The {0} has been saved. But some members could not be included.', 'Research'));
                }
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Research'));
            }
        }
        $users = $this->Researchs->Users->find('list', ['limit' => 200]);
        $this->set(compact('research', 'users'));
        $this->set('_serialize', ['research']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Research id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $loggedUser = $this->Auth->user();
        $user_id = $loggedUser['id'];

        $research = $this->Researchs->get($id, [
            'contain' => ['ResearchMembers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['user_id']  = "{$user_id}";
            $research = $this->Researchs->patchEntity($research, $this->request->data);
            $saved_research = $this->Researchs->save($research);
            if ($saved_research) {
                $this->loadModel('ResearchMembers');
                $membersList = $this->request['data']['members'];
                $warning = false;
                foreach($membersList as $member_data){

                    $member_data['research_id'] = $saved_research->id;
                    if(isset($member_data['id'])){
                        $member = $this->ResearchMembers->get($member_data['id']);
                    }else{
                        $member = $this->ResearchMembers->newEntity();
                    }
                    $member = $this->ResearchMembers->patchEntity($member, $member_data);

                    if(!$this->ResearchMembers->save($member)){
                        $warning = true;
                    }

                }
                if(!$warning){
                    $this->Flash->success(__('The {0} has been saved.', 'Research'));
                }else{
                    $this->Flash->error(__('The {0} has been saved. But some members could not be included.', 'Research'));
                }
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Research'));
            }
        }
        $users = $this->Researchs->Users->find('list', ['limit' => 200]);
        $this->set(compact('research', 'users'));
        $this->set('_serialize', ['research']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Research id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $research = $this->Researchs->get($id);
        if ($this->Researchs->delete($research)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Research'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Research'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
