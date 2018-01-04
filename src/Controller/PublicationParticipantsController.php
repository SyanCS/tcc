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
