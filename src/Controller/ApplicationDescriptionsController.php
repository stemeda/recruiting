<?php

namespace App\Controller\Backend;

/**
 * Applications Controller
 *
 * @property \App\Model\Table\ApplicationDescriptionsTable $ApplicationDescriptions
 */
class ApplicationDescriptionsController extends BackendController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null|void
     */
    public function index()
    {
        $applicationDescriptions = $this->ApplicationDescriptions->find('search', ['search' => $this->request->query]);
        $applicationDescriptions = $this->paginate($applicationDescriptions);

        $this->set(compact('applicationDescriptions'));
        $this->set('_serialize', ['applicationDescriptions']);
    }

    /**
     * View method
     *
     * @param string|null $id Application id.
     * @return \Cake\Network\Response|null|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applicationDescriptions = $this->ApplicationDescriptions->get($id, [
            'contain' => [
                'ApplicationDescriptionValues',
                'ApplicationDescriptionExtras'
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
        $applicationDescription = $this->ApplicationDescriptions->newEntity(
            [],
            [
                'associated' => [
                    'ApplicationDescriptionValues',
                    'ApplicationDescriptionExtras'
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
            $applicationDescription = $this->ApplicationDescriptions->patchEntity($applicationDescription, $data);
            if ($this->ApplicationDescriptions->save($applicationDescription, ['associated' => ['ApplicationDescriptionValues', 'ApplicationDescriptionExtras']])) {
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
     * @param string|null $id Application id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $applicationDescription = $this->ApplicationDescriptions->get($id, [
            'contain' => ['ApplicationDescriptionValues', 'ApplicationDescriptionExtras']
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
            $applicationDescription = $this->ApplicationDescriptions->patchEntity($applicationDescription, $data);
            if ($this->ApplicationDescriptions->save($applicationDescription, ['associated' => ['ApplicationDescriptionValues', 'ApplicationDescriptionExtras']])) {
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
     * @param string|null $id Application id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicationDescription = $this->ApplicationDescriptions->get($id, [
            'contain' => ['ApplicationDescriptionValues', 'ApplicationDescriptionExtras']
        ]);
        if ($this->ApplicationDescriptions->delete($applicationDescription)) {
            $this->Flash->success(__('The application has been deleted.'));
        } else {
            $this->Flash->error(__('The application could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
