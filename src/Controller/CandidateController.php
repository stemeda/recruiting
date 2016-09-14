<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Mailer\Email;
use Cake\Utility\Security;


/**
 * CakePHP StartController
 * @author stephan
 */
class CandidateController extends AppController
{

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['login', 'logout', 'register', 'emailInfo', 'email']);
    }

    /**
     * Action to login a user
     * 
     * @author Stephan Meyer <>
     * @since 10.09.2016
     * @return \Cake\Network\Response|null
     */
    public function login() {
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
     * Action to logout a user
     * 
     * @author Stephan Meyer <>
     * @since 10.09.2016
     * @return \Cake\Network\Response|null
     */
    public function logout() {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Action to register a new user. It creates a new entity and its registration.
     * A E-Mail to the user will be send, with a link to finalize registration.
     *
     * @author Stephan Meyer <>
     * @since 10.09.2016
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function register() {
        $this->loadModel('User');
        $user = $this->User->newEntity();
        if ($this->request->is('post')) {
            $userData = $this->request->data;
            $hashValue = Security::randomBytes(100) . php_uname() . microtime(true);
            $key = (string) hash('sha256', $hashValue);
            $userData['type'] = 'candidate';
            $userData['active'] = 'false';
            $userData['open_registration'] = [];
            $userData['open_registration']['valid_until'] = (new Time())->addDay(5);
            $userData['open_registration']['validate_key'] = $key;
            $user = $this->User->patchEntity($user, $userData);
            if ($this->User->save($user, ['associated' => ['OpenRegistrations']])) {
                $email = new Email();
                $t = $email->template('register', 'default')
                        ->emailFormat('both')
                        ->to($user->email)
                        ->viewVars(['key' => $key])
                        ->subject('Registrierung Bewerbung')
                        ->send();
                return $this->redirect(['action' => 'emailInfo']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Action to show the user information, that he has to finalize his registration
     * with the link in the email
     * 
     * @author Stephan Meyer <>
     * @since 10.09.2016
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function emailInfo()
    {
        
    }
    

    /**
     * Action to finalize the resitration. Checks if the user could be logged in,
     * if registration key is valid. Sets user to active and deletes registration 
     * key
     * 
     * @author Stephan Meyer <>
     * @since 10.09.2016
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function email($key = null)
    {
        $this->loadModel('User');
        if ($this->request->is('post')) {
            $checkUser = $this->request->data['username'];
            $checkPassword = $this->request->data['password'];
            $checkKey = $this->request->data['key'];
            $user = $this->User
                ->find('all')
                ->where(['username' => $checkUser, 'active' => false])
                ->contain(['OpenRegistrations'])
                ->first();
            switch (true) {
                case (new DefaultPasswordHasher)->check($checkPassword, $user->password):
                case !$user->open_registration->valid_until->isPast():
                case $checkKey === $user->open_registration->validate_key:
                    $this->User->activateAfterRegistration($user);
                    $this->Flash->success("Ihre E-Mail wurde erfolgreich validiert. Sie können sich jetzt anmelden.");
                    return $this->redirect('/');
                    break;
                default:
                    $this->Flash->error('Your username, password or key is incorrect.');
                  
            }
        }
        $this->set("key", $key);
    }

}
