<?php

namespace App\Controller\Backend;

use App\Controller\Backend\BackendController;

/**
 * User Controller
 *
 * @property \App\Model\Table\UserTable $User
 */
class UserController extends BackendController
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
        $this->Auth->allow(['logout']);
    }

    /**
     * action to login a user
     * @return mixed
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    /**
     * action to logout a user
     * @return mixed
     */
    public function logout()
    {
        $this->Flash->success('You are now logged out.');

        return $this->redirect($this->Auth->logout());
    }
}
