<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersTypes Controller
 *
 * @property \App\Model\Table\UsersTypesTable $UsersTypes
 *
 * @method \App\Model\Entity\UsersType[] paginate($object = null, array $settings = [])
 */
class UsersTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $usersTypes = $this->paginate($this->UsersTypes);

        $this->set(compact('usersTypes'));
        $this->set('_serialize', ['usersTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Users Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersType = $this->UsersTypes->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('usersType', $usersType);
        $this->set('_serialize', ['usersType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersType = $this->UsersTypes->newEntity();
        if ($this->request->is('post')) {
            $usersType = $this->UsersTypes->patchEntity($usersType, $this->request->data);
            if ($this->UsersTypes->save($usersType)) {
                $this->Flash->success(__('The {0} has been saved.', 'Users Type'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Users Type'));
            }
        }
        $this->set(compact('usersType'));
        $this->set('_serialize', ['usersType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersType = $this->UsersTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersType = $this->UsersTypes->patchEntity($usersType, $this->request->data);
            if ($this->UsersTypes->save($usersType)) {
                $this->Flash->success(__('The {0} has been saved.', 'Users Type'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Users Type'));
            }
        }
        $this->set(compact('usersType'));
        $this->set('_serialize', ['usersType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersType = $this->UsersTypes->get($id);
        if ($this->UsersTypes->delete($usersType)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Users Type'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Users Type'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
