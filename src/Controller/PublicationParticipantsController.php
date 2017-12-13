<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PublicationParticipants Controller
 *
 * @property \App\Model\Table\PublicationParticipantsTable $PublicationParticipants
 *
 * @method \App\Model\Entity\PublicationParticipant[] paginate($object = null, array $settings = [])
 */
class PublicationParticipantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Publications']
        ];
        $publicationParticipants = $this->paginate($this->PublicationParticipants);

        $this->set(compact('publicationParticipants'));
        $this->set('_serialize', ['publicationParticipants']);
    }

    /**
     * View method
     *
     * @param string|null $id Publication Participant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $publicationParticipant = $this->PublicationParticipants->get($id, [
            'contain' => ['Publications']
        ]);

        $publicationParticipant = $this->paginate($publicationParticipant);


        $this->set('publicationParticipant', $publicationParticipant);
        $this->set('_serialize', ['publicationParticipant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $publicationParticipant = $this->PublicationParticipants->newEntity();
        if ($this->request->is('post')) {
            $publicationParticipant = $this->PublicationParticipants->patchEntity($publicationParticipant, $this->request->data);
            if ($this->PublicationParticipants->save($publicationParticipant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Publication Participant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Publication Participant'));
            }
        }
        $publications = $this->PublicationParticipants->Publications->find('list', ['limit' => 200]);
        $this->set(compact('publicationParticipant', 'publications'));
        $this->set('_serialize', ['publicationParticipant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Publication Participant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $publicationParticipant = $this->PublicationParticipants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $publicationParticipant = $this->PublicationParticipants->patchEntity($publicationParticipant, $this->request->data);
            if ($this->PublicationParticipants->save($publicationParticipant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Publication Participant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Publication Participant'));
            }
        }
        $publications = $this->PublicationParticipants->Publications->find('list', ['limit' => 200]);
        $this->set(compact('publicationParticipant', 'publications'));
        $this->set('_serialize', ['publicationParticipant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Publication Participant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $publicationParticipant = $this->PublicationParticipants->get($id);
        if ($this->PublicationParticipants->delete($publicationParticipant)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Publication Participant'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Publication Participant'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
