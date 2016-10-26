<?php
namespace App\Controller\Backend\Administration;

use App\Controller\Backend\BackendController;

/**
 * User Controller
 *
 * @property \App\Model\Table\UserTable $Users
 */
class RecruiterController extends BackendController
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadModel('Users');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $user = $this->Users->find('search', ['search' => $this->request->query])->where(['Users.type IN ' => ['admin', 'recruiter']]);
        $user = $this->paginate($user);

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('Der Benutzer wurde gespeichert');

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Der Benutzer konnte nicht gespeichert werden.');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('Der Benutzer wurde gespeichert');

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Der Benutzer konnte nicht gespeichert werden.');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('Der Benutzer wurde gelöscht');
        } else {
            $this->Flash->error('Der Benutzer konnte nicht gelöscht werden.');
        }

        return $this->redirect(['action' => 'index']);
    }
}
