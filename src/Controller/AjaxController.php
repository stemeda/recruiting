<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Cake\Event\Event;

/**
 * CakePHP StartController
 * @author stephan
 */
class AjaxController extends AppController
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
        $this->Auth->allow();
    }

    /**
     * the index action
     *
     * @param int $id id of PositionDescription to load
     * @param int $count the current position
     *
     * @return void
     */
    public function loadPositionDescriptionView($id = null, $count = null)
    {
        if ($id === null || $count === null) {
            throw new \Cake\Network\Exception\NotFoundException();
        }
        $positionDescriptions = \Cake\ORM\TableRegistry::get('PositionDescriptions')->get($id, [
            'contain' => [
                'PositionDescriptionValues',
                'PositionDescriptionExtras'
            ]
        ]);

        $this->set('positionDescriptions', $positionDescriptions);
        $this->set('count', $count);
    }

    /**
     * the index action
     *
     * @param int $id id of PositionDescription to load
     * @param int $count the current position
     *
     * @return void
     */
    public function loadCandidateDescriptionView($id = null, $count = null)
    {
        if ($id === null || $count === null) {
            throw new \Cake\Network\Exception\NotFoundException();
        }
        $candidateDescriptions = \Cake\ORM\TableRegistry::get('CandidateDescriptions')->get($id, [
            'contain' => [
                'CandidateDescriptionValues',
                'CandidateDescriptionExtras'
            ]
        ]);

        $this->set('candidateDescriptions', $candidateDescriptions);
        $this->set('count', $count);
    }
}
