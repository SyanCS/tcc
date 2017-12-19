<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Publications Controller
 *
 * @property \App\Model\Table\PublicationsTable $Publications
 *
 * @method \App\Model\Entity\Publication[] paginate($object = null, array $settings = [])
 */
class PublicationsController extends AppController
{

    public function beforeRender(Event $event)
    {

        $action = $this->request->param('action');

        switch($action) {
            case 'edit' :
                if(isset($this->viewVars['publication']->date)){ 
                    $this->viewVars['publication']->date = date('d/m/Y', strtotime($this->viewVars['publication']->date));
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
        $publications = $this->Publications->findByUserId($user_id,[
            'contain' => ['Users'] 
        ]);

        $publications = $this->paginate($publications);

        $this->set(compact('publications'));
        $this->set('_serialize', ['publications']);
    }

    /**
     * View method
     *
     * @param string|null $id Publication id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $publication = $this->Publications->get($id, [
            'contain' => ['Users', 'PublicationParticipants']
        ]);

        $this->set('publication', $publication);
        $this->set('_serialize', ['publication']);
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

        $publication = $this->Publications->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['user_id']  = "{$user_id}";
            $publication = $this->Publications->patchEntity($publication, $this->request->data);
            $saved_publication = $this->Publications->save($publication);
            if ($saved_publication) {
                $this->loadModel('PublicationParticipants');
                $participantsList = $this->request['data']['participants'];
                $warning = false;
                foreach($participantsList as $participant_data){

                    $participant_data['publication_id'] = $saved_publication->id;
                    $participant = $this->PublicationParticipants->newEntity();
                    $participant = $this->PublicationParticipants->patchEntity($participant, $participant_data);

                    if(!$this->PublicationParticipants->save($participant)){
                        $warning = true;
                    }

                }
                if(!$warning){
                    $this->Flash->success(__('The {0} has been saved.', 'Publication'));
                }else{
                    $this->Flash->error(__('The {0} has been saved. But some participants could not be included.', 'Publication'));
                }
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Publication'));
            }
        }
        $users = $this->Publications->Users->find('list', ['limit' => 200]);
        $this->set(compact('publication', 'users'));
        $this->set('_serialize', ['publication']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Publication id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $loggedUser = $this->Auth->user();
        $user_id = $loggedUser['id'];

        $publication = $this->Publications->get($id, [
            'contain' => ['PublicationParticipants']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['user_id']  = "{$user_id}";
            $publication = $this->Publications->patchEntity($publication, $this->request->data);
            $saved_publication = $this->Publications->save($publication);
            if ($saved_publication) {
                $this->loadModel('PublicationParticipants');
                $participantsList = $this->request['data']['participants'];
                $warning = false;
                foreach($participantsList as $participant_data){

                    $participant_data['publication_id'] = $saved_publication->id;
                    if(isset($participant_data['id'])){
                        $participant = $this->PublicationParticipants->get($participant_data['id']);
                    }else{
                        $participant = $this->PublicationParticipants->newEntity();
                    }
                    $participant = $this->PublicationParticipants->patchEntity($participant, $participant_data);

                    if(!$this->PublicationParticipants->save($participant)){
                        $warning = true;
                    }

                }
                if(!$warning){
                    $this->Flash->success(__('The {0} has been saved.', 'Publication'));
                }else{
                    $this->Flash->error(__('The {0} has been saved. But some participants could not be included.', 'Publication'));
                }
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Publication'));
            }
        }
        $users = $this->Publications->Users->find('list', ['limit' => 200]);
        $this->set(compact('publication', 'users'));
        $this->set('_serialize', ['publication']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Publication id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $publication = $this->Publications->get($id);
        if ($this->Publications->delete($publication)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Publication'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Publication'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
