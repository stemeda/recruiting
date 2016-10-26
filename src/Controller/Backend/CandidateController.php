<?php

namespace App\Controller\Backend;

/**
 * Candidates Controller
 *
 * @property \App\Model\Table\PositionsTable $candidates
 */
class CandidateController extends BackendController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null|void
     */
    public function index()
    {
        $candidates = $this->paginate($this->Candidates);

        $this->set(compact('candidates'));
        $this->set('_serialize', ['candidates']);
    }

    /**
     * View method
     *
     * @param string|null $id Position id.
     * @return \Cake\Network\Response|null|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $candidate = $this->Candidates->get($id, [
            'contain' => ['CandidateDescriptionValues', 'CandidateDescriptionValues']
        ]);

        $this->set('candidate', $candidate);
        $this->set('_serialize', ['candidate']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $candidate = $this->Candidates->newEntity();
        if ($this->request->is('post')) {
            $candidate = $this->Candidates->patchEntity($candidate, $this->request->data);

            if ($this->Candidates->save($candidate, ['associated' => ['CandidateDescriptionValues']])) {
                $this->Flash->success('Der Kandidat wurde gespeichert.');

                return $this->redirect(['action' => 'index']);
            } else {
                debug($candidate);
                $this->Flash->error('Der Kandidat konnte nicht gespeichert werden.');
            }
        }
        //$candidateDescriptionValues = $this->Positions->CandidateDescriptionValues->find('list', ['limit' => 200]);
        $candidateDescriptions = \Cake\ORM\TableRegistry::get('PositionDescriptions')->find('all')->contain(['PositionDescriptionValues']);
        $this->set(compact('candidate', 'candidateDescriptions'));
        $this->set('_serialize', ['candidate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Position id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $candidate = $this->Candidates->get($id, [
            'contain' => ['CandidateDescriptionValues', 'CandidateDescriptionValues']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $candidate = $this->Candidates->patchEntity($candidate, $this->request->data);
            if ($this->Candidates->save($candidate)) {
                $this->Flash->success('Der Kandidat wurde gespeichert.');

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Der Kandidat konnte nicht gespeichert werden.');
            }
        }
        $candidateDescriptionValues = $this->Candidates->CandidateDescriptionValues->find('list', ['limit' => 200]);
        $candidateDescriptionValues = $this->Candidates->CandidateDescriptionValues->find('list', ['limit' => 200]);
        $this->set(compact('candidate', 'candidateDescriptionValues', 'candidateDescriptionValues'));
        $this->set('_serialize', ['candidate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Position id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $candidate = $this->Candidates->get($id);
        if ($this->Candidates->delete($candidate)) {
            $this->Flash->success('Der Kandidat wurde gelöscht.');
        } else {
            $this->Flash->error('Der Kandidat konnte nicht gelöscht werden.');
        }

        return $this->redirect(['action' => 'index']);
    }
}
