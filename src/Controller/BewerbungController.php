<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bewerbung Controller
 *
 * @property \App\Model\Table\BewerbungTable $Bewerbung
 */
class BewerbungController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Stellen', 'Abschluesse', 'BewerbungStatus']
        ];
        $bewerbung = $this->paginate($this->Bewerbung);

        $this->set(compact('bewerbung'));
        $this->set('_serialize', ['bewerbung']);
    }

    /**
     * View method
     *
     * @param string|null $id Bewerbung id.
     * @return void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bewerbung = $this->Bewerbung->get($id, [
            'contain' => ['Stellen', 'Abschluesse', 'BewerbungStatus']
        ]);

        $this->set('bewerbung', $bewerbung);
        $this->set('_serialize', ['bewerbung']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bewerbung = $this->Bewerbung->newEntity();
        if ($this->request->is('post')) {
            $bewerbung = $this->Bewerbung->patchEntity($bewerbung, $this->request->data);
            if ($this->Bewerbung->save($bewerbung)) {
                $this->Flash->success(__('The bewerbung has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bewerbung could not be saved. Please, try again.'));
            }
        }
        $stellen = $this->Bewerbung->Stellen->find('list', ['limit' => 200]);
        $abschluesse = $this->Bewerbung->Abschluesse->find('list', ['limit' => 200]);
        $bewerbungStatus = $this->Bewerbung->BewerbungStatus->find('list', ['limit' => 200]);
        $this->set(compact('bewerbung', 'stellen', 'abschluesse', 'bewerbungStatus'));
        $this->set('_serialize', ['bewerbung']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bewerbung id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bewerbung = $this->Bewerbung->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bewerbung = $this->Bewerbung->patchEntity($bewerbung, $this->request->data);
            if ($this->Bewerbung->save($bewerbung)) {
                $this->Flash->success(__('The bewerbung has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bewerbung could not be saved. Please, try again.'));
            }
        }
        $stellen = $this->Bewerbung->Stellen->find('list', ['limit' => 200]);
        $abschluesse = $this->Bewerbung->Abschluesse->find('list', ['limit' => 200]);
        $bewerbungStatus = $this->Bewerbung->BewerbungStatus->find('list', ['limit' => 200]);
        $this->set(compact('bewerbung', 'stellen', 'abschluesse', 'bewerbungStatus'));
        $this->set('_serialize', ['bewerbung']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bewerbung id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bewerbung = $this->Bewerbung->get($id);
        if ($this->Bewerbung->delete($bewerbung)) {
            $this->Flash->success(__('The bewerbung has been deleted.'));
        } else {
            $this->Flash->error(__('The bewerbung could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
