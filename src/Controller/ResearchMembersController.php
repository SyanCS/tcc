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
     * View method
     *
     * @param string|null $id Research Member id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $researchMember = $this->ResearchMembers->get($id, [
            'contain' => ['Researchs']
        ]);

        $this->set('researchMember', $researchMember);
        $this->set('_serialize', ['researchMember']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $researchMember = $this->ResearchMembers->newEntity();
        if ($this->request->is('post')) {
            $researchMember = $this->ResearchMembers->patchEntity($researchMember, $this->request->data);
            if ($this->ResearchMembers->save($researchMember)) {
                $this->Flash->success(__('The {0} has been saved.', 'Research Member'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Research Member'));
            }
        }
        $researchs = $this->ResearchMembers->Researchs->find('list', ['limit' => 200]);
        $this->set(compact('researchMember', 'researchs'));
        $this->set('_serialize', ['researchMember']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Research Member id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $researchMember = $this->ResearchMembers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $researchMember = $this->ResearchMembers->patchEntity($researchMember, $this->request->data);
            if ($this->ResearchMembers->save($researchMember)) {
                $this->Flash->success(__('The {0} has been saved.', 'Research Member'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Research Member'));
            }
        }
        $researchs = $this->ResearchMembers->Researchs->find('list', ['limit' => 200]);
        $this->set(compact('researchMember', 'researchs'));
        $this->set('_serialize', ['researchMember']);
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
