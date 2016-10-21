<?php

namespace App\Controller\Backend;

/**
 * Positions Controller
 *
 * @property \App\Model\Table\PositionDescriptionsTable $PositionDescriptions
 */
class PositionDescriptionsController extends BackendController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null|void
     */
    public function index()
    {
        $applicationDescriptions = $this->PositionDescriptions->find('search', ['search' => $this->request->query]);
        $applicationDescriptions = $this->paginate($applicationDescriptions);

        $this->set(compact('applicationDescriptions'));
        $this->set('_serialize', ['applicationDescriptions']);
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
        $applicationDescriptions = $this->PositionDescriptions->get($id, [
            'contain' => [
                'PositionDescriptionValues',
                'PositionDescriptionExtras'
            ]
        ]);

        $this->set('applicationDescriptions', $applicationDescriptions);
        $this->set('_serialize', ['applicationDescriptions']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $applicationDescription = $this->PositionDescriptions->newEntity(
            [],
            [
                'associated' => [
                    'PositionDescriptionValues',
                    'PositionDescriptionExtras'
                ],
                'validate' => false
            ]
        );
        if ($this->request->is('post')) {
            $data = $this->request->data;
            foreach ($data['application_description_values'] as $key => $value) {
                if ($value['name'] === '') {
                    unset($data['application_description_values'][$key]);
                }
            }
            foreach ($data['application_description_extras'] as $key => $value) {
                if ($value['name'] === '' || $value['type'] === '') {
                    unset($data['application_description_extras'][$key]);
                }
            }
            $applicationDescription = $this->PositionDescriptions->patchEntity($applicationDescription, $data);
            if ($this->PositionDescriptions->save($applicationDescription, ['associated' => ['PositionDescriptionValues', 'PositionDescriptionExtras']])) {
                $this->Flash->success(__('The application has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The application could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('applicationDescription'));
        $this->set('_serialize', ['applicationDescription']);
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
        $applicationDescription = $this->PositionDescriptions->get($id, [
            'contain' => ['PositionDescriptionValues', 'PositionDescriptionExtras']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            foreach ($data['application_description_values'] as $key => $value) {
                if ($value['name'] === '') {
                    unset($data['application_description_values'][$key]);
                }
            }
            foreach ($data['application_description_extras'] as $key => $value) {
                if ($value['name'] === '' || $value['type'] === '') {
                    unset($data['application_description_extras'][$key]);
                }
            }
            $applicationDescription = $this->PositionDescriptions->patchEntity($applicationDescription, $data);
            if ($this->PositionDescriptions->save($applicationDescription, ['associated' => ['PositionDescriptionValues', 'PositionDescriptionExtras']])) {
                $this->Flash->success(__('The application has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The application could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('applicationDescription'));
        $this->set('_serialize', ['applicationDescription']);
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
        $applicationDescription = $this->PositionDescriptions->get($id, [
            'contain' => ['PositionDescriptionValues', 'PositionDescriptionExtras']
        ]);
        if ($this->PositionDescriptions->delete($applicationDescription)) {
            $this->Flash->success(__('The application has been deleted.'));
        } else {
            $this->Flash->error(__('The application could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
