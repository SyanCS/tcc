<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Resumes Controller
 *
 * @property \App\Model\Table\ResumesTable $Resumes
 *
 * @method \App\Model\Entity\Resume[] paginate($object = null, array $settings = [])
 */
class ResumesController extends AppController
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
        $resumes = $this->paginate($this->Resumes);

        $this->set(compact('resumes'));
        $this->set('_serialize', ['resumes']);
    }

    /**
     * View method
     *
     * @param string|null $id Resume id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resume = $this->Resumes->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('resume', $resume);
        $this->set('_serialize', ['resume']);
    }

    public function download($id = null)
    {
        if(!isset($id)){
            $loggedUser = $this->Auth->user();
            $id = $loggedUser['id'];
        }

        $resume = $this->Resumes->findByUserId($id, [
            'contain' => []
        ])
        ->first();
        $filePath = WWW_ROOT .'resumes'. DS . $resume['url'];
        //dump($filePath);exit;
        $extension = explode(".",$resume['url']);
        $extension = end($extension);
        $filename  = "resume_".str_replace(" ","_",$loggedUser['name']).".".$extension;  
        $this->response->file($filePath ,
        array('download'=> true, 'name'=> $filename));
        return $this->response;
    }

    /**
     * Edit method
     *
     * @param string|null $id Resume id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function upload()
    {
        $loggedUser = $this->Auth->user();
        $user_id = $loggedUser['id'];

        $resume = $this->Resumes->findByUserId($user_id, [
            'contain' => []
        ])
        ->first();
        if ($this->request->is(['patch', 'post', 'put'])) {

            $this->request->data['user_id'] = "{$user_id}";
            $file = $this->request->data['upload'];
            $fileDir = ROOT.DS.'webroot'.DS.'resumes'.DS;
            $fileName = hash('ripemd160',$user_id.$loggedUser['name']).$file['name'];
            move_uploaded_file ( $file['tmp_name'] , $fileDir.$fileName);

            $this->request->data['url'] = $fileName;

            if(!$resume){
                    $resume = $this->Resumes->newEntity();
                }
            $resume = $this->Resumes->patchEntity($resume, $this->request->data);
            if ($this->Resumes->save($resume)) {
                $this->Flash->success(__('The {0} has been uploaded.', 'Resume'));
                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be uploaded. Please, try again.', 'Resume'));
            }
        }
        $users = $this->Resumes->Users->find('list', ['limit' => 200]);
        $this->set(compact('resume', 'users'));
        $this->set('_serialize', ['resume']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Resume id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resume = $this->Resumes->get($id);
        if ($this->Resumes->delete($resume)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Resume'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Resume'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
