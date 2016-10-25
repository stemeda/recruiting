<?php

namespace App\Controller\Backend;

/**
 * Positions Controller
 *
 * @property \App\Model\Table\PositionsTable $applications
 */
class PositionsController extends BackendController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null|void
     */
    public function index()
    {
        $positions = $this->paginate($this->Positions);

        $this->set(compact('positions'));
        $this->set('_serialize', ['positions']);
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
        $position = $this->Positions->get($id, [
            'contain' => ['CandidateDescriptionValues', 'PositionDescriptionValues']
        ]);

        $this->set('position', $position);
        $this->set('_serialize', ['position']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $position = $this->Positions->newEntity();
        if ($this->request->is('post')) {
            $position = $this->Positions->patchEntity($position, $this->request->data);

            if ($this->Positions->save($position, ['associated' => ['PositionsPositionDescriptionValues', 'PositionsCandidateDescriptionValues']])) {
                $this->Flash->success(__('The position has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                debug($position);
                $this->Flash->error(__('The position could not be saved. Please, try again.'));
            }
        }
        //$candidateDescriptionValues = $this->Positions->CandidateDescriptionValues->find('list', ['limit' => 200]);
        $positionDescriptions = \Cake\ORM\TableRegistry::get('PositionDescriptions')->find('all')->contain(['PositionDescriptionValues']);
        $candidateDescriptions = \Cake\ORM\TableRegistry::get('CandidateDescriptions')->find('all')->contain(['CandidateDescriptionValues']);
        $this->set(compact('position', 'positionDescriptions', 'candidateDescriptions'));
        $this->set('_serialize', ['position']);
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
        $position = $this->Positions->get($id, [
            'contain' => ['CandidateDescriptionValues', 'PositionDescriptionValues']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $position = $this->Positions->patchEntity($position, $this->request->data);
            if ($this->Positions->save($position)) {
                $this->Flash->success(__('The position has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The position could not be saved. Please, try again.'));
            }
        }
        $candidateDescriptionValues = $this->Positions->CandidateDescriptionValues->find('list', ['limit' => 200]);
        $positionDescriptionValues = $this->Positions->PositionDescriptionValues->find('list', ['limit' => 200]);
        $this->set(compact('position', 'candidateDescriptionValues', 'positionDescriptionValues'));
        $this->set('_serialize', ['position']);
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
        $position = $this->Positions->get($id);
        if ($this->Positions->delete($position)) {
            $this->Flash->success(__('The position has been deleted.'));
        } else {
            $this->Flash->error(__('The position could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
