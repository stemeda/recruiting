<?php
namespace App\Controller\Backend;

/**
 * BewerbungStatus Controller
 *
 * @property \App\Model\Table\BewerbungStatusTable $BewerbungStatus
 */
class BewerbungStatusController extends BackendController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $bewerbungStatus = $this->paginate($this->BewerbungStatus);

        $this->set(compact('bewerbungStatus'));
        $this->set('_serialize', ['bewerbungStatus']);
    }

    /**
     * View method
     *
     * @param string|null $id Bewerbung Status id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bewerbungStatus = $this->BewerbungStatus->get($id, [
            'contain' => ['Bewerbung']
        ]);

        $this->set('bewerbungStatus', $bewerbungStatus);
        $this->set('_serialize', ['bewerbungStatus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bewerbungStatus = $this->BewerbungStatus->newEntity();
        if ($this->request->is('post')) {
            $bewerbungStatus = $this->BewerbungStatus->patchEntity($bewerbungStatus, $this->request->data);
            if ($this->BewerbungStatus->save($bewerbungStatus)) {
                $this->Flash->success(__('The bewerbung status has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bewerbung status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('bewerbungStatus'));
        $this->set('_serialize', ['bewerbungStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bewerbung Status id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bewerbungStatus = $this->BewerbungStatus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bewerbungStatus = $this->BewerbungStatus->patchEntity($bewerbungStatus, $this->request->data);
            if ($this->BewerbungStatus->save($bewerbungStatus)) {
                $this->Flash->success(__('The bewerbung status has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bewerbung status could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('bewerbungStatus'));
        $this->set('_serialize', ['bewerbungStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bewerbung Status id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bewerbungStatus = $this->BewerbungStatus->get($id);
        if ($this->BewerbungStatus->delete($bewerbungStatus)) {
            $this->Flash->success(__('The bewerbung status has been deleted.'));
        } else {
            $this->Flash->error(__('The bewerbung status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
