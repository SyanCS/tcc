<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Awards Controller
 *
 * @property \App\Model\Table\AwardsTable $Awards
 *
 * @method \App\Model\Entity\Award[] paginate($object = null, array $settings = [])
 */
class AwardsController extends AppController
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
        $awards = $this->Awards->findByUserId($user_id,[
            'contain' => ['Users'] 
        ]);
        $awards = $this->paginate($awards);

        $this->set(compact('awards'));
        $this->set('_serialize', ['awards']);
    }

    /**
     * View method
     *
     * @param string|null $id Award id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $loggedUser = $this->Auth->user();
        $user_id = $loggedUser['id'];

        $award = $this->Awards->get($id, [
            'contain' => ['Users']
        ]);

        if($award->user_id != $user_id){
            $this->Flash->error(__('You cannot view this {0}.', 'Award'));
            return $this->redirect(['action' => 'index']);
        }

        $this->set('award', $award);
        $this->set('_serialize', ['award']);
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

        $award = $this->Awards->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['user_id'] = "{$user_id}";
            $award = $this->Awards->patchEntity($award, $this->request->data);
            if ($this->Awards->save($award)) {
                $this->Flash->success(__('The {0} has been saved.', 'Award'));
                return $this->redirect(['action' => 'index']);
            } else {
                dump($award->errors());exit;
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Award'));
            }
        }
        $users = $this->Awards->Users->find('list', ['limit' => 200]);
        $this->set(compact('award', 'users'));
        $this->set('_serialize', ['award']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Award id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $loggedUser = $this->Auth->user();
        $user_id = $loggedUser['id'];

        $award = $this->Awards->get($id, [
            'contain' => []
        ]);

        if($award->user_id != $user_id){
            $this->Flash->error(__('You cannot edit this {0}.', 'Award'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['user_id'] = "{$user_id}";
            $award = $this->Awards->patchEntity($award, $this->request->data);
            if ($this->Awards->save($award)) {
                $this->Flash->success(__('The {0} has been saved.', 'Award'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Award'));
            }
        }
        $users = $this->Awards->Users->find('list', ['limit' => 200]);
        $this->set(compact('award', 'users'));
        $this->set('_serialize', ['award']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Award id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $award = $this->Awards->get($id);
        if ($this->Awards->delete($award)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Award'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Award'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
