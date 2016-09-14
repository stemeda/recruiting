<?php
namespace App\Controller\Backend;

/**
 * Abschluesse Controller
 *
 * @property \App\Model\Table\AbschluesseTable $Abschluesse
 */
class AbschluesseController extends BackendController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $abschluesse = $this->paginate($this->Abschluesse);

        $this->set(compact('abschluesse'));
        $this->set('_serialize', ['abschluesse']);
    }

    /**
     * View method
     *
     * @param string|null $id Abschluesse id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $abschluesse = $this->Abschluesse->get($id, [
            'contain' => ['AbschluesseHasStellen', 'Bewerbung']
        ]);

        $this->set('abschluesse', $abschluesse);
        $this->set('_serialize', ['abschluesse']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $abschluesse = $this->Abschluesse->newEntity();
        if ($this->request->is('post')) {
            $abschluesse = $this->Abschluesse->patchEntity($abschluesse, $this->request->data);
            if ($this->Abschluesse->save($abschluesse)) {
                $this->Flash->success(__('The abschluesse has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The abschluesse could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('abschluesse'));
        $this->set('_serialize', ['abschluesse']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Abschluesse id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $abschluesse = $this->Abschluesse->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $abschluesse = $this->Abschluesse->patchEntity($abschluesse, $this->request->data);
            if ($this->Abschluesse->save($abschluesse)) {
                $this->Flash->success(__('The abschluesse has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The abschluesse could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('abschluesse'));
        $this->set('_serialize', ['abschluesse']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Abschluesse id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $abschluesse = $this->Abschluesse->get($id);
        if ($this->Abschluesse->delete($abschluesse)) {
            $this->Flash->success(__('The abschluesse has been deleted.'));
        } else {
            $this->Flash->error(__('The abschluesse could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
