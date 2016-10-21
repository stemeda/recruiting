<?php

namespace App\Controller\Backend;

/**
 * Applications Controller
 *
 * @property \App\Model\Table\PositionsTable $applications
 */
class ApplicationController extends BackendController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null|void
     */
    public function index()
    {
        $applications = $this->paginate($this->applications);

        $this->set(compact('applications'));
        $this->set('_serialize', ['applications']);
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
        $application = $this->applications->get($id, [
            'contain' => ['CandidateDescriptionValues', 'PositionDescriptionValues']
        ]);

        $this->set('application', $application);
        $this->set('_serialize', ['application']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $application = $this->applications->newEntity();
        if ($this->request->is('post')) {
            $application = $this->applications->patchEntity($application, $this->request->data);

            if ($this->applications->save($application, ['associated' => ['PositionsPositionDescriptionValues']])) {
                $this->Flash->success(__('The application has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                debug($application);
                $this->Flash->error(__('The application could not be saved. Please, try again.'));
            }
        }
        //$candidateDescriptionValues = $this->Positions->CandidateDescriptionValues->find('list', ['limit' => 200]);
        $applicationDescriptions = \Cake\ORM\TableRegistry::get('PositionDescriptions')->find('all')->contain(['PositionDescriptionValues']);
        $this->set(compact('application', 'applicationDescriptions'));
        $this->set('_serialize', ['application']);
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
        $application = $this->applications->get($id, [
            'contain' => ['CandidateDescriptionValues', 'PositionDescriptionValues']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $application = $this->applications->patchEntity($application, $this->request->data);
            if ($this->applications->save($application)) {
                $this->Flash->success(__('The application has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The application could not be saved. Please, try again.'));
            }
        }
        $candidateDescriptionValues = $this->applications->CandidateDescriptionValues->find('list', ['limit' => 200]);
        $applicationDescriptionValues = $this->applications->PositionDescriptionValues->find('list', ['limit' => 200]);
        $this->set(compact('application', 'candidateDescriptionValues', 'applicationDescriptionValues'));
        $this->set('_serialize', ['application']);
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
        $application = $this->applications->get($id);
        if ($this->applications->delete($application)) {
            $this->Flash->success(__('The application has been deleted.'));
        } else {
            $this->Flash->error(__('The application could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
