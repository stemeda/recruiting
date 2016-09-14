<?php
namespace App\Controller\Backend;

/**
 * BewerbungHasZusatzqualifikationen Controller
 *
 * @property \App\Model\Table\BewerbungHasZusatzqualifikationenTable $BewerbungHasZusatzqualifikationen
 */
class BewerbungHasZusatzqualifikationenController extends BackendController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Bewerbung', 'Zusatzqualifikationen']
        ];
        $bewerbungHasZusatzqualifikationen = $this->paginate($this->BewerbungHasZusatzqualifikationen);

        $this->set(compact('bewerbungHasZusatzqualifikationen'));
        $this->set('_serialize', ['bewerbungHasZusatzqualifikationen']);
    }

    /**
     * View method
     *
     * @param string|null $id Bewerbung Has Zusatzqualifikationen id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bewerbungHasZusatzqualifikationen = $this->BewerbungHasZusatzqualifikationen->get($id, [
            'contain' => ['Bewerbung', 'Zusatzqualifikationen']
        ]);

        $this->set('bewerbungHasZusatzqualifikationen', $bewerbungHasZusatzqualifikationen);
        $this->set('_serialize', ['bewerbungHasZusatzqualifikationen']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bewerbungHasZusatzqualifikationen = $this->BewerbungHasZusatzqualifikationen->newEntity();
        if ($this->request->is('post')) {
            $bewerbungHasZusatzqualifikationen = $this->BewerbungHasZusatzqualifikationen->patchEntity($bewerbungHasZusatzqualifikationen, $this->request->data);
            if ($this->BewerbungHasZusatzqualifikationen->save($bewerbungHasZusatzqualifikationen)) {
                $this->Flash->success(__('The bewerbung has zusatzqualifikationen has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bewerbung has zusatzqualifikationen could not be saved. Please, try again.'));
            }
        }
        $bewerbung = $this->BewerbungHasZusatzqualifikationen->Bewerbung->find('list', ['limit' => 200]);
        $zusatzqualifikationen = $this->BewerbungHasZusatzqualifikationen->Zusatzqualifikationen->find('list', ['limit' => 200]);
        $this->set(compact('bewerbungHasZusatzqualifikationen', 'bewerbung', 'zusatzqualifikationen'));
        $this->set('_serialize', ['bewerbungHasZusatzqualifikationen']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bewerbung Has Zusatzqualifikationen id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bewerbungHasZusatzqualifikationen = $this->BewerbungHasZusatzqualifikationen->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bewerbungHasZusatzqualifikationen = $this->BewerbungHasZusatzqualifikationen->patchEntity($bewerbungHasZusatzqualifikationen, $this->request->data);
            if ($this->BewerbungHasZusatzqualifikationen->save($bewerbungHasZusatzqualifikationen)) {
                $this->Flash->success(__('The bewerbung has zusatzqualifikationen has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bewerbung has zusatzqualifikationen could not be saved. Please, try again.'));
            }
        }
        $bewerbung = $this->BewerbungHasZusatzqualifikationen->Bewerbung->find('list', ['limit' => 200]);
        $zusatzqualifikationen = $this->BewerbungHasZusatzqualifikationen->Zusatzqualifikationen->find('list', ['limit' => 200]);
        $this->set(compact('bewerbungHasZusatzqualifikationen', 'bewerbung', 'zusatzqualifikationen'));
        $this->set('_serialize', ['bewerbungHasZusatzqualifikationen']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bewerbung Has Zusatzqualifikationen id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bewerbungHasZusatzqualifikationen = $this->BewerbungHasZusatzqualifikationen->get($id);
        if ($this->BewerbungHasZusatzqualifikationen->delete($bewerbungHasZusatzqualifikationen)) {
            $this->Flash->success(__('The bewerbung has zusatzqualifikationen has been deleted.'));
        } else {
            $this->Flash->error(__('The bewerbung has zusatzqualifikationen could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
