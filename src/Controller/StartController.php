<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Cake\Event\Event;
use Cake\I18n\Time;

/**
 * CakePHP StartController
 * @author stephan
 */
class StartController extends AppController
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
        $this->Auth->allow('index');
        $this->loadModel('Positions');
    }

    /**
     * the index action
     *
     * @return void
     */
    public function index()
    {
        $time = new Time();
        $positions = $this->Positions->find('all')->where([
            'active' => true,
            'awailable_from <' => $time,
            'awailable_until >' => $time,
        ]);
        $this->set('positions', $positions);
    }

    /**
     * the view action
     *
     * @param int $id id of position to load
     *
     * @return void
     */
    public function view($id = null)
    {
        $time = new Time();
        $position = $this->Positions->get($id);
        $this->set('position', $position);
    }
}
