<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Advisors Controller
 *
 * @property \App\Model\Table\AdvisorsTable $Advisors
 *
 * @method \App\Model\Entity\Advisor[] paginate($object = null, array $settings = [])
 */
class AdvisorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $loggedUser = $this->Auth->user();
        $user_id = $loggedUser['id'];
        $advisors = $this->Advisors->findByUserId($user_id,[
            'contain' => ['Users'] 
        ]);

        $advisors = $this->paginate($advisors);
        $this->set(compact('advisors'));
        $this->set('_serialize', ['advisors']);
    }

    /**
     * View method
     *
     * @param string|null $id Advisor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $advisor = $this->Advisors->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('advisor', $advisor);
        $this->set('_serialize', ['advisor']);
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

        $advisor = $this->Advisors->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['user_id'] = "{$user_id}";
            $advisor = $this->Advisors->patchEntity($advisor, $this->request->data);
            if ($this->Advisors->save($advisor)) {
                $this->Flash->success(__('The {0} has been saved.', 'Advisor'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Advisor'));
            }
        }
        $users = $this->Advisors->Users->find('list', ['limit' => 200]);
        $this->set(compact('advisor', 'users'));
        $this->set('_serialize', ['advisor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Advisor id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $loggedUser = $this->Auth->user();
        $user_id = $loggedUser['id'];

        $advisor = $this->Advisors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['user_id'] = "{$user_id}";
            $advisor = $this->Advisors->patchEntity($advisor, $this->request->data);
            if ($this->Advisors->save($advisor)) {
                $this->Flash->success(__('The {0} has been saved.', 'Advisor'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Advisor'));
            }
        }
        $users = $this->Advisors->Users->find('list', ['limit' => 200]);
        $this->set(compact('advisor', 'users'));
        $this->set('_serialize', ['advisor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Advisor id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $advisor = $this->Advisors->get($id);
        if ($this->Advisors->delete($advisor)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Advisor'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Advisor'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
