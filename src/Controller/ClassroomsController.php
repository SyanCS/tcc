<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Classrooms Controller
 *
 * @property \App\Model\Table\ClassroomsTable $Classrooms
 *
 * @method \App\Model\Entity\Classroom[] paginate($object = null, array $settings = [])
 */
class ClassroomsController extends AppController
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
        $classrooms = $this->Classrooms->findByUserId($user_id,[
            'contain' => ['Users'] 
        ]);
        $classrooms = $this->paginate($classrooms);

        $this->set(compact('classrooms'));
        $this->set('_serialize', ['classrooms']);
    }

    /**
     * View method
     *
     * @param string|null $id Classroom id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $classroom = $this->Classrooms->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('classroom', $classroom);
        $this->set('_serialize', ['classroom']);
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

        $classroom = $this->Classrooms->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['user_id'] = "{$user_id}";
            $classroom = $this->Classrooms->patchEntity($classroom, $this->request->data);
            if ($this->Classrooms->save($classroom)) {
                $this->Flash->success(__('The {0} has been saved.', 'Classroom'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Classroom'));
            }
        }
        $users = $this->Classrooms->Users->find('list', ['limit' => 200]);
        $this->set(compact('classroom', 'users'));
        $this->set('_serialize', ['classroom']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Classroom id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $loggedUser = $this->Auth->user();
        $user_id = $loggedUser['id'];

        $classroom = $this->Classrooms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['user_id'] = "{$user_id}";
            $classroom = $this->Classrooms->patchEntity($classroom, $this->request->data);
            if ($this->Classrooms->save($classroom)) {
                $this->Flash->success(__('The {0} has been saved.', 'Classroom'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Classroom'));
            }
        }
        $users = $this->Classrooms->Users->find('list', ['limit' => 200]);
        $this->set(compact('classroom', 'users'));
        $this->set('_serialize', ['classroom']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Classroom id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $classroom = $this->Classrooms->get($id);
        if ($this->Classrooms->delete($classroom)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Classroom'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Classroom'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
