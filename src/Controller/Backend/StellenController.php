<?php
namespace App\Controller\Backend;

/**
 * Stellen Controller
 *
 * @property \App\Model\Table\StellenTable $Stellen
 */
class StellenController extends BackendController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $stellen = $this->paginate($this->Stellen);

        $this->set(compact('stellen'));
        $this->set('_serialize', ['stellen']);
    }

    /**
     * View method
     *
     * @param string|null $id Stellen id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stellen = $this->Stellen->get($id, [
            'contain' => ['AbschluesseHasStellen', 'Bewerbung', 'StellenHasBerufserfahrung', 'StellenHasZusatzqualifikationen']
        ]);

        $this->set('stellen', $stellen);
        $this->set('_serialize', ['stellen']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stellen = $this->Stellen->newEntity();
        if ($this->request->is('post')) {
            $stellen = $this->Stellen->patchEntity($stellen, $this->request->data);
            if ($this->Stellen->save($stellen)) {
                $this->Flash->success(__('The stellen has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The stellen could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('stellen'));
        $this->set('_serialize', ['stellen']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Stellen id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stellen = $this->Stellen->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stellen = $this->Stellen->patchEntity($stellen, $this->request->data);
            if ($this->Stellen->save($stellen)) {
                $this->Flash->success(__('The stellen has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The stellen could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('stellen'));
        $this->set('_serialize', ['stellen']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Stellen id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stellen = $this->Stellen->get($id);
        if ($this->Stellen->delete($stellen)) {
            $this->Flash->success(__('The stellen has been deleted.'));
        } else {
            $this->Flash->error(__('The stellen could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
