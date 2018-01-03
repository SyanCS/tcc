<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * AcademicDegrees Controller
 *
 * @property \App\Model\Table\AcademicDegreesTable $AcademicDegrees
 *
 * @method \App\Model\Entity\AcademicDegree[] paginate($object = null, array $settings = [])
 */
class AcademicDegreesController extends AppController
{

    public function beforeRender(Event $event)
    {

        $action = $this->request->param('action');

        switch($action) {
            case 'edit' :
                if(isset($this->viewVars['academicDegree']->start_date)){ 
                    $this->viewVars['academicDegree']->start_date = date('d/m/Y', strtotime($this->viewVars['academicDegree']->start_date));
                }
                if(isset($this->viewVars['academicDegree']->end_date)){
                    $this->viewVars['academicDegree']->end_date = date('d/m/Y', strtotime($this->viewVars['academicDegree']->end_date));
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
        $academicDegrees = $this->AcademicDegrees->findByUserId($user_id,[
            'contain' => ['Users'] 
        ]);

        $academicDegrees = $this->paginate($academicDegrees);
        $this->set(compact('academicDegrees'));
        $this->set('_serialize', ['academicDegrees']);
    }

    /**
     * View method
     *
     * @param string|null $id Academic Degree id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $loggedUser = $this->Auth->user();
        $user_id = $loggedUser['id'];

        $academicDegree = $this->AcademicDegrees->get($id, [
            'contain' => ['Users']
        ]);

        if($academicDegree->user_id != $user_id){
            $this->Flash->error(__('You cannot view this {0}.', 'Academic Degree'));
            return $this->redirect(['action' => 'index']);
        }

        $this->set('academicDegree', $academicDegree);
        $this->set('_serialize', ['academicDegree']);
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

        $academicDegree = $this->AcademicDegrees->newEntity();
        if ($this->request->is('post')) {
            $start_date = $this->request->data['start_date'];
            $end_date   = $this->request->data['end_date'];

            $this->request->data['user_id']     =   "{$user_id}";
            $academicDegree = $this->AcademicDegrees->patchEntity($academicDegree, $this->request->data);
            if ($this->AcademicDegrees->save($academicDegree)) {
                $this->Flash->success(__('The {0} has been saved.', 'Academic Degree'));
                return $this->redirect(['action' => 'index']);
            } else {
                //dump($academicDegree->errors());exit;
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Academic Degree'));
            }
        }
        
        $this->set(compact('academicDegree'));
        $this->set('_serialize', ['academicDegree']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Academic Degree id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $loggedUser = $this->Auth->user();
        $user_id = $loggedUser['id'];

        $academicDegree = $this->AcademicDegrees->get($id, [
            'contain' => []
        ]);

        if($academicDegree->user_id != $user_id){
            $this->Flash->error(__('You cannot edit this {0}.', 'Academic Degree'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $start_date = $this->request->data['start_date'];
            $end_date   = $this->request->data['end_date'];

            $this->request->data['user_id']     =   "{$user_id}";
            $academicDegree = $this->AcademicDegrees->patchEntity($academicDegree, $this->request->data);
            if ($this->AcademicDegrees->save($academicDegree)) {
                $this->Flash->success(__('The {0} has been saved.', 'Academic Degree'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Academic Degree'));
            }
        }

        $this->set(compact('academicDegree'));
        $this->set('_serialize', ['academicDegree']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Academic Degree id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $academicDegree = $this->AcademicDegrees->get($id);
        if ($this->AcademicDegrees->delete($academicDegree)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Academic Degree'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Academic Degree'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
