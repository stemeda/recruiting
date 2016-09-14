<?php
namespace App\Controller\Backend;

/**
 * StellenHasBerufserfahrung Controller
 *
 * @property \App\Model\Table\StellenHasBerufserfahrungTable $StellenHasBerufserfahrung
 */
class StellenHasBerufserfahrungController extends BackendController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Stellen', 'Berufserfahrung']
        ];
        $stellenHasBerufserfahrung = $this->paginate($this->StellenHasBerufserfahrung);

        $this->set(compact('stellenHasBerufserfahrung'));
        $this->set('_serialize', ['stellenHasBerufserfahrung']);
    }

    /**
     * View method
     *
     * @param string|null $id Stellen Has Berufserfahrung id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stellenHasBerufserfahrung = $this->StellenHasBerufserfahrung->get($id, [
            'contain' => ['Stellen', 'Berufserfahrung']
        ]);

        $this->set('stellenHasBerufserfahrung', $stellenHasBerufserfahrung);
        $this->set('_serialize', ['stellenHasBerufserfahrung']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stellenHasBerufserfahrung = $this->StellenHasBerufserfahrung->newEntity();
        if ($this->request->is('post')) {
            $stellenHasBerufserfahrung = $this->StellenHasBerufserfahrung->patchEntity($stellenHasBerufserfahrung, $this->request->data);
            if ($this->StellenHasBerufserfahrung->save($stellenHasBerufserfahrung)) {
                $this->Flash->success(__('The stellen has berufserfahrung has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The stellen has berufserfahrung could not be saved. Please, try again.'));
            }
        }
        $stellen = $this->StellenHasBerufserfahrung->Stellen->find('list', ['limit' => 200]);
        $berufserfahrung = $this->StellenHasBerufserfahrung->Berufserfahrung->find('list', ['limit' => 200]);
        $this->set(compact('stellenHasBerufserfahrung', 'stellen', 'berufserfahrung'));
        $this->set('_serialize', ['stellenHasBerufserfahrung']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Stellen Has Berufserfahrung id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stellenHasBerufserfahrung = $this->StellenHasBerufserfahrung->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stellenHasBerufserfahrung = $this->StellenHasBerufserfahrung->patchEntity($stellenHasBerufserfahrung, $this->request->data);
            if ($this->StellenHasBerufserfahrung->save($stellenHasBerufserfahrung)) {
                $this->Flash->success(__('The stellen has berufserfahrung has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The stellen has berufserfahrung could not be saved. Please, try again.'));
            }
        }
        $stellen = $this->StellenHasBerufserfahrung->Stellen->find('list', ['limit' => 200]);
        $berufserfahrung = $this->StellenHasBerufserfahrung->Berufserfahrung->find('list', ['limit' => 200]);
        $this->set(compact('stellenHasBerufserfahrung', 'stellen', 'berufserfahrung'));
        $this->set('_serialize', ['stellenHasBerufserfahrung']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Stellen Has Berufserfahrung id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stellenHasBerufserfahrung = $this->StellenHasBerufserfahrung->get($id);
        if ($this->StellenHasBerufserfahrung->delete($stellenHasBerufserfahrung)) {
            $this->Flash->success(__('The stellen has berufserfahrung has been deleted.'));
        } else {
            $this->Flash->error(__('The stellen has berufserfahrung could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
