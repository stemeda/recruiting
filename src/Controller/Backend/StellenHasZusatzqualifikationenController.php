<?php
namespace App\Controller\Backend;

/**
 * StellenHasZusatzqualifikationen Controller
 *
 * @property \App\Model\Table\StellenHasZusatzqualifikationenTable $StellenHasZusatzqualifikationen
 */
class StellenHasZusatzqualifikationenController extends BackendController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Stellen', 'Zusatzqualifikationen']
        ];
        $stellenHasZusatzqualifikationen = $this->paginate($this->StellenHasZusatzqualifikationen);

        $this->set(compact('stellenHasZusatzqualifikationen'));
        $this->set('_serialize', ['stellenHasZusatzqualifikationen']);
    }

    /**
     * View method
     *
     * @param string|null $id Stellen Has Zusatzqualifikationen id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stellenHasZusatzqualifikationen = $this->StellenHasZusatzqualifikationen->get($id, [
            'contain' => ['Stellen', 'Zusatzqualifikationen']
        ]);

        $this->set('stellenHasZusatzqualifikationen', $stellenHasZusatzqualifikationen);
        $this->set('_serialize', ['stellenHasZusatzqualifikationen']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stellenHasZusatzqualifikationen = $this->StellenHasZusatzqualifikationen->newEntity();
        if ($this->request->is('post')) {
            $stellenHasZusatzqualifikationen = $this->StellenHasZusatzqualifikationen->patchEntity($stellenHasZusatzqualifikationen, $this->request->data);
            if ($this->StellenHasZusatzqualifikationen->save($stellenHasZusatzqualifikationen)) {
                $this->Flash->success(__('The stellen has zusatzqualifikationen has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The stellen has zusatzqualifikationen could not be saved. Please, try again.'));
            }
        }
        $stellen = $this->StellenHasZusatzqualifikationen->Stellen->find('list', ['limit' => 200]);
        $zusatzqualifikationen = $this->StellenHasZusatzqualifikationen->Zusatzqualifikationen->find('list', ['limit' => 200]);
        $this->set(compact('stellenHasZusatzqualifikationen', 'stellen', 'zusatzqualifikationen'));
        $this->set('_serialize', ['stellenHasZusatzqualifikationen']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Stellen Has Zusatzqualifikationen id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stellenHasZusatzqualifikationen = $this->StellenHasZusatzqualifikationen->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stellenHasZusatzqualifikationen = $this->StellenHasZusatzqualifikationen->patchEntity($stellenHasZusatzqualifikationen, $this->request->data);
            if ($this->StellenHasZusatzqualifikationen->save($stellenHasZusatzqualifikationen)) {
                $this->Flash->success(__('The stellen has zusatzqualifikationen has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The stellen has zusatzqualifikationen could not be saved. Please, try again.'));
            }
        }
        $stellen = $this->StellenHasZusatzqualifikationen->Stellen->find('list', ['limit' => 200]);
        $zusatzqualifikationen = $this->StellenHasZusatzqualifikationen->Zusatzqualifikationen->find('list', ['limit' => 200]);
        $this->set(compact('stellenHasZusatzqualifikationen', 'stellen', 'zusatzqualifikationen'));
        $this->set('_serialize', ['stellenHasZusatzqualifikationen']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Stellen Has Zusatzqualifikationen id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stellenHasZusatzqualifikationen = $this->StellenHasZusatzqualifikationen->get($id);
        if ($this->StellenHasZusatzqualifikationen->delete($stellenHasZusatzqualifikationen)) {
            $this->Flash->success(__('The stellen has zusatzqualifikationen has been deleted.'));
        } else {
            $this->Flash->error(__('The stellen has zusatzqualifikationen could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
