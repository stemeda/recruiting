<?php
namespace App\Controller\Backend;

/**
 * Zusatzqualifikationen Controller
 *
 * @property \App\Model\Table\ZusatzqualifikationenTable $Zusatzqualifikationen
 */
class ZusatzqualifikationenController extends BackendController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $zusatzqualifikationen = $this->paginate($this->Zusatzqualifikationen);

        $this->set(compact('zusatzqualifikationen'));
        $this->set('_serialize', ['zusatzqualifikationen']);
    }

    /**
     * View method
     *
     * @param string|null $id Zusatzqualifikationen id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $zusatzqualifikationen = $this->Zusatzqualifikationen->get($id, [
            'contain' => ['BewerbungHasZusatzqualifikationen', 'StellenHasZusatzqualifikationen']
        ]);

        $this->set('zusatzqualifikationen', $zusatzqualifikationen);
        $this->set('_serialize', ['zusatzqualifikationen']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $zusatzqualifikationen = $this->Zusatzqualifikationen->newEntity();
        if ($this->request->is('post')) {
            $zusatzqualifikationen = $this->Zusatzqualifikationen->patchEntity($zusatzqualifikationen, $this->request->data);
            if ($this->Zusatzqualifikationen->save($zusatzqualifikationen)) {
                $this->Flash->success(__('The zusatzqualifikationen has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The zusatzqualifikationen could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('zusatzqualifikationen'));
        $this->set('_serialize', ['zusatzqualifikationen']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Zusatzqualifikationen id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $zusatzqualifikationen = $this->Zusatzqualifikationen->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $zusatzqualifikationen = $this->Zusatzqualifikationen->patchEntity($zusatzqualifikationen, $this->request->data);
            if ($this->Zusatzqualifikationen->save($zusatzqualifikationen)) {
                $this->Flash->success(__('The zusatzqualifikationen has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The zusatzqualifikationen could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('zusatzqualifikationen'));
        $this->set('_serialize', ['zusatzqualifikationen']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Zusatzqualifikationen id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $zusatzqualifikationen = $this->Zusatzqualifikationen->get($id);
        if ($this->Zusatzqualifikationen->delete($zusatzqualifikationen)) {
            $this->Flash->success(__('The zusatzqualifikationen has been deleted.'));
        } else {
            $this->Flash->error(__('The zusatzqualifikationen could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
