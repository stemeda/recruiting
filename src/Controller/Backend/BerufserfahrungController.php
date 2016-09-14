<?php
namespace App\Controller\Backend;

/**
 * Berufserfahrung Controller
 *
 * @property \App\Model\Table\BerufserfahrungTable $Berufserfahrung
 */
class BerufserfahrungController extends BackendController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $berufserfahrung = $this->paginate($this->Berufserfahrung);

        $this->set(compact('berufserfahrung'));
        $this->set('_serialize', ['berufserfahrung']);
    }

    /**
     * View method
     *
     * @param string|null $id Berufserfahrung id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $berufserfahrung = $this->Berufserfahrung->get($id, [
            'contain' => ['StellenHasBerufserfahrung']
        ]);

        $this->set('berufserfahrung', $berufserfahrung);
        $this->set('_serialize', ['berufserfahrung']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $berufserfahrung = $this->Berufserfahrung->newEntity();
        if ($this->request->is('post')) {
            $berufserfahrung = $this->Berufserfahrung->patchEntity($berufserfahrung, $this->request->data);
            if ($this->Berufserfahrung->save($berufserfahrung)) {
                $this->Flash->success(__('The berufserfahrung has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The berufserfahrung could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('berufserfahrung'));
        $this->set('_serialize', ['berufserfahrung']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Berufserfahrung id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $berufserfahrung = $this->Berufserfahrung->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $berufserfahrung = $this->Berufserfahrung->patchEntity($berufserfahrung, $this->request->data);
            if ($this->Berufserfahrung->save($berufserfahrung)) {
                $this->Flash->success(__('The berufserfahrung has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The berufserfahrung could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('berufserfahrung'));
        $this->set('_serialize', ['berufserfahrung']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Berufserfahrung id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $berufserfahrung = $this->Berufserfahrung->get($id);
        if ($this->Berufserfahrung->delete($berufserfahrung)) {
            $this->Flash->success(__('The berufserfahrung has been deleted.'));
        } else {
            $this->Flash->error(__('The berufserfahrung could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
