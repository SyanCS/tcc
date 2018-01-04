<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid User or Password, try again.'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }


    public function forgot()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $username   = $this->request['data']['username'];
            $user       = $this->Users->findByUsername($username)->first();

            if ($user) {
                $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';

                $key = '';
                $max = strlen($characters) - 1;
                for ($i = 0; $i < 20; $i++) {
                    $key .= $characters[mt_rand(0, $max)];
                }

                $email = new Email();
                $email->from(['syantccmailer@gmail.com' => 'Admin'])
                    ->to($username)
                    ->subject('Password Change')
                    ->send('Heres your code to change your password: '.$key);

                $user->reset_token = $key;
                if($this->Users->save($user)){
                    $this->Flash->success(__('Code sent.'));
                    return $this->redirect(['action' => 'reset']);
                }
            }
            $this->Flash->error(__('Invalid Email, try again.'));
        }
        $this->set('user', $user);
    }

    public function reset()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $username   = $this->request['data']['username'];
            $user       = $this->Users->findByUsername($username)->first();

            if ($user) {

                if($this->request->data['reset_token'] == $user->reset_token){
                    $user = $this->Users->patchEntity($user, $this->request->data);
                    if($this->Users->save($user)){
                        $this->Flash->success(__('Password changed.'));
                        return $this->redirect(['action' => 'login']);
                    }
                }else {
                    $this->Flash->error(__('Invalid Token, try again.'));
                }
            } else{
                $this->Flash->error(__('Invalid Email, try again.'));
            }
        }
        $this->set('user', $user);
    }

    public function register(){
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['users_type_id'] = "2";
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The {0} has been saved.', 'User'));
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'User'));
            }
        }
        $usersTypes = $this->Users->UsersTypes->find('list', ['limit' => 200]);
        $this->set(compact('user', 'usersTypes'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        
        $this->paginate = [
            'contain' => ['UsersTypes']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }



    public function profile($name = null)
    {

        if($name == null){
            $loggedUser = $this->Auth->user();
            $name = $loggedUser['name'];
            $this->redirect(['controller' => 'Users','action' => 'profile',$name]);
        }

        if($user = $this->Users->findByName($name)->first()){

            $id = $user->id;

            $user = $this->Users->get($id, [
                'contain' => [
                    'AcademicDegrees' => [
                        'sort' => ['AcademicDegrees.end_date' => 'ASC'],
                    ],
                    'Advisors' => [
                        'sort' => ['Advisors.year' => 'ASC']
                    ],  
                    'Awards' => [
                        'sort' => ['Awards.winning_year' => 'ASC']
                    ],  
                    'Classrooms' => [
                        'sort' => ['Classrooms.year' => 'ASC', 'Classrooms.semester' => 'ASC' ]
                    ],  
                    'ProfitionalPositions' => [
                        'sort' => ['ProfitionalPositions.end_date' => 'ASC']
                    ],  
                    'Publications' => [
                        'sort' => ['Publications.date' => 'ASC'],
                        'PublicationParticipants'
                    ],  
                    'Researchs' => [
                        'sort' => ['Researchs.end_date' => 'ASC'],
                        'ResearchMembers'
                    ],
                    'MainInfos',   
                    'Resumes'
                ]
            ]);
            $this->set('user', $user);
            $this->set('_serialize', ['user']);

        } else{
            $this->Flash->error(__('User not Found.'));
            $this->redirect(['controller' => 'Pages','action' => 'notfound']);
        }

        
    }


    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*public function view($id = null)
    {
        $loggedUser = $this->Auth->user();
        if($loggedUser['users_type_id'] != 1){
            $this->Flash->error(__('You are not authorized to access this.'));
            return $this->redirect(['controller' => 'MainInfos','action' => 'edit']);
        }

        $user = $this->Users->get($id, [
            'contain' => ['UsersTypes', 'AcademicDegrees', 'Advisors', 'Awards', 'Classrooms', 'MainInfos', 'ProfitionalPositions', 'Publications', 'Researchs', 'Resumes']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }*/

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $loggedUser = $this->Auth->user();
        if($loggedUser['users_type_id'] != 1){
            $this->Flash->error(__('You are not authorized to access this.'));
            return $this->redirect(['controller' => 'MainInfos','action' => 'edit']);
        }

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The {0} has been saved.', 'User'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'User'));
            }
        }
        $usersTypes = $this->Users->UsersTypes->find('list', ['limit' => 200]);
        $this->set(compact('user', 'usersTypes'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loggedUser = $this->Auth->user();
        if($loggedUser['users_type_id'] != 1){
            $this->Flash->error(__('You are not authorized to access this.'));
            return $this->redirect(['controller' => 'MainInfos','action' => 'edit']);
        }

        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The {0} has been saved.', 'User'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'User'));
            }
        }
        $usersTypes = $this->Users->UsersTypes->find('list', ['limit' => 200]);
        $this->set(compact('user', 'usersTypes'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $loggedUser = $this->Auth->user();
        if($loggedUser['users_type_id'] != 1){
            $this->Flash->error(__('You are not authorized to access this.'));
            return $this->redirect(['controller' => 'MainInfos','action' => 'edit']);
        }

        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The {0} has been deleted.', 'User'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'User'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
