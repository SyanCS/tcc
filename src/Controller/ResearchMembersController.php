<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ResearchMembers Controller
 *
 * @property \App\Model\Table\ResearchMembersTable $ResearchMembers
 *
 * @method \App\Model\Entity\ResearchMember[] paginate($object = null, array $settings = [])
 */
class ResearchMembersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Researchs']
        ];
        $researchMembers = $this->paginate($this->ResearchMembers);

        $this->set(compact('researchMembers'));
        $this->set('_serialize', ['researchMembers']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Research Member id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $researchMember = $this->ResearchMembers->get($id);
        if ($this->ResearchMembers->delete($researchMember)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Research Member'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Research Member'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
