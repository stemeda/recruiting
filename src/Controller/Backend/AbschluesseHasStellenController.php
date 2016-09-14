<?php
namespace App\Controller\Backend;

/**
 * AbschluesseHasStellen Controller
 *
 * @property \App\Model\Table\AbschluesseHasStellenTable $AbschluesseHasStellen
 */
class AbschluesseHasStellenController extends BackendController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Abschluesse', 'Stellen']
        ];
        $abschluesseHasStellen = $this->paginate($this->AbschluesseHasStellen);

        $this->set(compact('abschluesseHasStellen'));
        $this->set('_serialize', ['abschluesseHasStellen']);
    }

    /**
     * View method
     *
     * @param string|null $id Abschluesse Has Stellen id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $abschluesseHasStellen = $this->AbschluesseHasStellen->get($id, [
            'contain' => ['Abschluesse', 'Stellen']
        ]);

        $this->set('abschluesseHasStellen', $abschluesseHasStellen);
        $this->set('_serialize', ['abschluesseHasStellen']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $abschluesseHasStellen = $this->AbschluesseHasStellen->newEntity();
        if ($this->request->is('post')) {
            $abschluesseHasStellen = $this->AbschluesseHasStellen->patchEntity($abschluesseHasStellen, $this->request->data);
            if ($this->AbschluesseHasStellen->save($abschluesseHasStellen)) {
                $this->Flash->success(__('The abschluesse has stellen has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The abschluesse has stellen could not be saved. Please, try again.'));
            }
        }
        $abschluesse = $this->AbschluesseHasStellen->Abschluesse->find('list', ['limit' => 200]);
        $stellen = $this->AbschluesseHasStellen->Stellen->find('list', ['limit' => 200]);
        $this->set(compact('abschluesseHasStellen', 'abschluesse', 'stellen'));
        $this->set('_serialize', ['abschluesseHasStellen']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Abschluesse Has Stellen id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $abschluesseHasStellen = $this->AbschluesseHasStellen->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $abschluesseHasStellen = $this->AbschluesseHasStellen->patchEntity($abschluesseHasStellen, $this->request->data);
            if ($this->AbschluesseHasStellen->save($abschluesseHasStellen)) {
                $this->Flash->success(__('The abschluesse has stellen has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The abschluesse has stellen could not be saved. Please, try again.'));
            }
        }
        $abschluesse = $this->AbschluesseHasStellen->Abschluesse->find('list', ['limit' => 200]);
        $stellen = $this->AbschluesseHasStellen->Stellen->find('list', ['limit' => 200]);
        $this->set(compact('abschluesseHasStellen', 'abschluesse', 'stellen'));
        $this->set('_serialize', ['abschluesseHasStellen']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Abschluesse Has Stellen id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $abschluesseHasStellen = $this->AbschluesseHasStellen->get($id);
        if ($this->AbschluesseHasStellen->delete($abschluesseHasStellen)) {
            $this->Flash->success(__('The abschluesse has stellen has been deleted.'));
        } else {
            $this->Flash->error(__('The abschluesse has stellen could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
