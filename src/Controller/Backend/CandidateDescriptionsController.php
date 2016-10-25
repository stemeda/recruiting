<?php

namespace App\Controller\Backend;

/**
 * CandidateDescriptions Controller
 *
 * @property \App\Model\Table\CandidateDescriptionsTable $CandidateDescriptions
 */
class CandidateDescriptionsController extends BackendController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null|void
     */
    public function index()
    {
        $candidateDescriptions = $this->CandidateDescriptions->find('search', ['search' => $this->request->query]);
        $candidateDescriptions = $this->paginate($candidateDescriptions);

        $this->set(compact('candidateDescriptions'));
        $this->set('_serialize', ['candidateDescriptions']);
    }

    /**
     * View method
     *
     * @param string|null $id Candidate id.
     * @return \Cake\Network\Response|null|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $candidateDescriptions = $this->CandidateDescriptions->get($id, [
            'contain' => [
                'CandidateDescriptionValues',
                'CandidateDescriptionExtras'
            ]
        ]);

        $this->set('candidateDescriptions', $candidateDescriptions);
        $this->set('_serialize', ['candidateDescriptions']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $candidateDescription = $this->CandidateDescriptions->newEntity(
            [],
            [
                'associated' => [
                    'CandidateDescriptionValues',
                    'CandidateDescriptionExtras'
                ],
                'validate' => false
            ]
        );
        if ($this->request->is('post')) {
            $data = $this->request->data;
            foreach ($data['candidate_description_values'] as $key => $value) {
                if ($value['name'] === '') {
                    unset($data['candidate_description_values'][$key]);
                }
            }
            foreach ($data['candidate_description_extras'] as $key => $value) {
                if ($value['name'] === '' || $value['type'] === '') {
                    unset($data['candidate_description_extras'][$key]);
                }
            }
            $candidateDescription = $this->CandidateDescriptions->patchEntity($candidateDescription, $data);
            if ($this->CandidateDescriptions->save($candidateDescription, ['associated' => ['CandidateDescriptionValues', 'CandidateDescriptionExtras']])) {
                $this->Flash->success(__('The candidate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The candidate could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('candidateDescription'));
        $this->set('_serialize', ['candidateDescription']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Candidate id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $candidateDescription = $this->CandidateDescriptions->get($id, [
            'contain' => ['CandidateDescriptionValues', 'CandidateDescriptionExtras']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            foreach ($data['candidate_description_values'] as $key => $value) {
                if ($value['name'] === '') {
                    unset($data['candidate_description_values'][$key]);
                }
            }
            foreach ($data['candidate_description_extras'] as $key => $value) {
                if ($value['name'] === '' || $value['type'] === '') {
                    unset($data['candidate_description_extras'][$key]);
                }
            }
            $candidateDescription = $this->CandidateDescriptions->patchEntity($candidateDescription, $data);
            if ($this->CandidateDescriptions->save($candidateDescription, ['associated' => ['CandidateDescriptionValues', 'CandidateDescriptionExtras']])) {
                $this->Flash->success(__('The candidate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The candidate could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('candidateDescription'));
        $this->set('_serialize', ['candidateDescription']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Candidate id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $candidateDescription = $this->CandidateDescriptions->get($id, [
            'contain' => ['CandidateDescriptionValues', 'CandidateDescriptionExtras']
        ]);
        if ($this->CandidateDescriptions->delete($candidateDescription)) {
            $this->Flash->success(__('The candidate has been deleted.'));
        } else {
            $this->Flash->error(__('The candidate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
