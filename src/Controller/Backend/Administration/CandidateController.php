<?php
namespace App\Controller\Backend\Administration;

use App\Controller\Backend\BackendController;

/**
 * User Controller
 *
 * @property \App\Model\Table\UserTable $User
 */
class CandidateController extends AdminController
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
        $user = $this->Users->find('search', ['search' => $this->request->query])->where(['Users.type IN ' => ['candidate']]);
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
}
