<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller\Backend;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class BackendController extends Controller
{
    use \FrontendBridge\Lib\FrontendBridgeTrait;

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

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Users',
                    'finder' => 'backend',
                ]
            ],
            'loginAction' => [
                'controller' => 'User',
                'action' => 'login',
                'prefix' => 'backend',
            ],
            'loginRedirect' => [
                'controller' => 'Start',
                'action' => 'index',
                'prefix' => 'backend',
            ],
            'authorize' => 'Controller',
        ]);
        $this->loadComponent('Search.Prg', [
            // This is default config. You can modify "actions" as needed to make
            // the PRG component work only for specified methods.
            'actions' => ['index', 'lookup']
        ]);
        $this->loadComponent('FrontendBridge.FrontendBridge');

        $this->viewBuilder()->layout('backend');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
                in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        $this->set('userSession', $this->Auth->user());
    }

    /**
     * check if user is set and user is type candidate
     * @param array $user the user to check for authorization
     * @return bool
     */
    public function isAuthorized($user = null)
    {
        if ($user === null) {
            return false;
        }
        if (isset($user['type']) && in_array($user['type'], ['recruiter', 'admin'])) {
            return true;
        }

        return false;
    }
}
