<?php
namespace App\Controller\Backend;

/**
 * Filestorage Controller
 *
 * @property \App\Model\Table\FilestorageTable $Filestorage
 */
class FilestorageController extends BackendController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Models']
        ];
        $filestorage = $this->paginate($this->Filestorage);

        $this->set(compact('filestorage'));
        $this->set('_serialize', ['filestorage']);
    }

    /**
     * View method
     *
     * @param string|null $id Filestorage id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $filestorage = $this->Filestorage->get($id, [
            'contain' => ['Models']
        ]);

        $this->set('filestorage', $filestorage);
        $this->set('_serialize', ['filestorage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $filestorage = $this->Filestorage->newEntity();
        if ($this->request->is('post')) {
            $filestorage = $this->Filestorage->patchEntity($filestorage, $this->request->data);
            if ($this->Filestorage->save($filestorage)) {
                $this->Flash->success(__('The filestorage has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The filestorage could not be saved. Please, try again.'));
            }
        }
        $models = $this->Filestorage->Models->find('list', ['limit' => 200]);
        $this->set(compact('filestorage', 'models'));
        $this->set('_serialize', ['filestorage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Filestorage id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $filestorage = $this->Filestorage->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $filestorage = $this->Filestorage->patchEntity($filestorage, $this->request->data);
            if ($this->Filestorage->save($filestorage)) {
                $this->Flash->success(__('The filestorage has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The filestorage could not be saved. Please, try again.'));
            }
        }
        $models = $this->Filestorage->Models->find('list', ['limit' => 200]);
        $this->set(compact('filestorage', 'models'));
        $this->set('_serialize', ['filestorage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Filestorage id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $filestorage = $this->Filestorage->get($id);
        if ($this->Filestorage->delete($filestorage)) {
            $this->Flash->success(__('The filestorage has been deleted.'));
        } else {
            $this->Flash->error(__('The filestorage could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
