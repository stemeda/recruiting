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
        $positionDescriptions = $this->PositionDescriptions->find('search', ['search' => $this->request->query]);
        $positionDescriptions = $this->paginate($positionDescriptions);

        $this->set(compact('positionDescriptions'));
        $this->set('_serialize', ['positionDescriptions']);
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
        $positionDescriptions = $this->PositionDescriptions->get($id, [
            'contain' => [
                'PositionDescriptionValues',
                'PositionDescriptionExtras'
            ]
        ]);

        $this->set('positionDescriptions', $positionDescriptions);
        $this->set('_serialize', ['positionDescriptions']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $positionDescription = $this->PositionDescriptions->newEntity(
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
            foreach ($data['position_description_values'] as $key => $value) {
                if ($value['name'] === '') {
                    unset($data['position_description_values'][$key]);
                }
            }
            foreach ($data['position_description_extras'] as $key => $value) {
                if ($value['name'] === '' || $value['type'] === '') {
                    unset($data['position_description_extras'][$key]);
                }
            }
            $positionDescription = $this->PositionDescriptions->patchEntity($positionDescription, $data);
            if ($this->PositionDescriptions->save($positionDescription, ['associated' => ['PositionDescriptionValues', 'PositionDescriptionExtras']])) {
                $this->Flash->success('Der Datensatz wurde gespeichert.');

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The position could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('positionDescription'));
        $this->set('_serialize', ['positionDescription']);
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
        $positionDescription = $this->PositionDescriptions->get($id, [
            'contain' => ['PositionDescriptionValues', 'PositionDescriptionExtras']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            foreach ($data['position_description_values'] as $key => $value) {
                if ($value['name'] === '') {
                    unset($data['position_description_values'][$key]);
                }
            }
            foreach ($data['position_description_extras'] as $key => $value) {
                if ($value['name'] === '' || $value['type'] === '') {
                    unset($data['position_description_extras'][$key]);
                }
            }
            $positionDescription = $this->PositionDescriptions->patchEntity($positionDescription, $data);
            if ($this->PositionDescriptions->save($positionDescription, ['associated' => ['PositionDescriptionValues', 'PositionDescriptionExtras']])) {
                $this->Flash->success('Der Datensatz wurde gespeichert.');

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The position could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('positionDescription'));
        $this->set('_serialize', ['positionDescription']);
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
        $positionDescription = $this->PositionDescriptions->get($id, [
            'contain' => ['PositionDescriptionValues', 'PositionDescriptionExtras']
        ]);
        if ($this->PositionDescriptions->delete($positionDescription)) {
            $this->Flash->success(__('The position has been deleted.'));
        } else {
            $this->Flash->error(__('The position could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
