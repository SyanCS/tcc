<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MainInfos Controller
 *
 * @property \App\Model\Table\MainInfosTable $MainInfos
 *
 * @method \App\Model\Entity\MainInfo[] paginate($object = null, array $settings = [])
 */
class MainInfosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $mainInfos = $this->paginate($this->MainInfos);

        $this->set(compact('mainInfos'));
        $this->set('_serialize', ['mainInfos']);
    }

    /**
     * View method
     *
     * @param string|null $id Main Info id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $loggedUser = $this->Auth->user();
        $user_id = $loggedUser['id'];

        $mainInfo = $this->MainInfos->get($id, [
            'contain' => ['Users']
        ]);

        if($mainInfo->user_id != $user_id){
            $this->Flash->error(__('You cannot view this {0}.', 'Main Info'));
            return $this->redirect(['action' => 'index']);
        }

        $mainInfo = $this->paginate($mainInfo);
        $this->set('mainInfo', $mainInfo);
        $this->set('_serialize', ['mainInfo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mainInfo = $this->MainInfos->newEntity();
        if ($this->request->is('post')) {
            $mainInfo = $this->MainInfos->patchEntity($mainInfo, $this->request->data);
            if ($this->MainInfos->save($mainInfo)) {
                $this->Flash->success(__('The {0} has been saved.', 'Main Info'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Main Info'));
            }
        }
        $users = $this->MainInfos->Users->find('list', ['limit' => 200]);
        $this->set(compact('mainInfo', 'users'));
        $this->set('_serialize', ['mainInfo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Main Info id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        $loggedUser = $this->Auth->user();

        $user_id = $loggedUser['id'];

        $mainInfo = $this->MainInfos->findByUserId($user_id, [
            'contain' => []
        ])
        ->first();

        if($mainInfo->user_id != $user_id){
            $this->Flash->error(__('You cannot edit this {0}.', 'Main Info'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            //dump($this->request->data);exit;
            $this->request->data['user_id'] = "{$user_id}";
            $file = $this->request->data['photo'];
            //dump($file);exit;

            if(!empty($file['tmp_name'])){

                if(strpos($file['type'],'image') !== FALSE){

                    $picsDir = ROOT.DS.'webroot'.DS.'img'.DS;
                    $picName = hash('ripemd160',$user_id.$loggedUser['name']).".png";
                    move_uploaded_file ( $file['tmp_name'] , $picsDir.$picName);
                    $this->request->data['photo'] = hash('ripemd160',$user_id.$loggedUser['name']).".png";
                }else {
                    $this->Flash->error(__('The {0} could not be saved. Photo must be an Image, try again.', 'Main Info'));  
                }   
            } else{
                if(isset($mainInfo)){
                    $this->request->data['photo'] = $mainInfo->photo;
                }
            }

            if(!$mainInfo){
                $mainInfo = $this->MainInfos->newEntity();
            }
            $mainInfo = $this->MainInfos->patchEntity($mainInfo, $this->request->data);
            if ($this->MainInfos->save($mainInfo)) {
                $this->Flash->success(__('The {0} has been saved.', 'Main Info'));
                return $this->redirect(['action' => 'edit']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Main Info'));
            }
        }

        $users = $this->MainInfos->Users->find('list', ['limit' => 200]);
        $this->set(compact('mainInfo', 'users'));
        $this->set('_serialize', ['mainInfo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Main Info id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mainInfo = $this->MainInfos->get($id);
        if ($this->MainInfos->delete($mainInfo)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Main Info'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Main Info'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
