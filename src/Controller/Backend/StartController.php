<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Backend;

use Cake\Event\Event;

/**
 * CakePHP StartController
 * @author stephan
 */
class StartController extends BackendController
{

    /**
     * set index action to be allowed without authentication
     *
     * @param Event $event the event that has been called
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }

    /**
     * the index action
     *
     * @return void
     */
    public function index()
    {
    }
}
