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
        $this->Auth->allow(['index', 'view']);
        $this->loadModel('Positions');
        /*Damian*/
        $this->Auth->allow(['index', 'view']);
        $this->loadModel('Applications');
        
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
        /*Damian*/
        $application = $this->Applications->find('all')->where([
            'active' => true,
            'awailable_from <' => $time,
            'awailable_until >' => $time,
        ]);
        $this->set('application', $application);
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
        /*Damian*/
        $applicaion = $this->Applitions->get($id);
        $this->set('application', $application);
    }

    /**
     * the view action
     *
     * @param int $id id of position to load
     *
     * @return void
     */
    public function applicate($id = null)
    {
        $this->loadModel('Users');
        $this->loadModel('PositionDescriptions');
        $position = $this->Positions->get($id, [
            'contain' => [
                'CandidateDescriptionValues',
                'PositionDescriptionValues' => [
                    'PositionDescriptions'
                ],
            ]
        ]);
        $positionDescriptionIds = $this->PositionDescriptions
            ->find('all')
            ->distinct()
            ->select(['PositionDescriptions.id'])
            ->matching(
                'PositionDescriptionValues.PositionsPositionDescriptionValues'
            )
            ->where([
                'PositionsPositionDescriptionValues.positions_id' => $id,
            ]);
        $positionDescriptions = $this->PositionDescriptions->find('all')
            ->contain([
                'PositionDescriptionValues',
                'PositionDescriptionExtras'
            ])
            ->where([
                'PositionDescriptions.id IN' => $positionDescriptionIds,
            ]);
        $user = $this->Users->get(
            $this->Auth->user('id'),
            [
                'contain' => [
                    'Candidates'
                ]
            ]
        );
        if ($this->request->is(['post', 'put'])) {
            $requestData = $this->request->data;
            foreach ($requestData['candidate']['applications'][0]['applications_position_description_values'] as $key => $value) {
                if ($value['positions_description_values_id'] === '') {
                    unset($requestData['candidate']['applications'][0]['applications_position_description_values'][$key]);
                }
            }
            $requestData['candidate']['applications'][0]['application_status_id'] = 1;
            $user = $this->Users->patchEntity($user, $requestData, ['associated' => ['Candidates.Applications.ApplicationsPositionDescriptionValues.ApplsPosDesValuesPosDesExtras']]);
            //debug($user);exit;
            if ($this->Users->save($user, ['associated' => [
                'Candidates',
                'Candidates.Applications',
                'Candidates.Applications.ApplicationsPositionDescriptionValues',
                'Candidates.Applications.ApplicationsPositionDescriptionValues.ApplsPosDesValuesPosDesExtras',
                ]])) {
                $this->Flash->success('Bewerbung gespeichert!');
            }
        }
        $this->set('candidate', $user);
        $this->set('position', $position);
        $this->set('positionDescriptions', $positionDescriptions);
    /*Damian*/
    $this->loadModel('Users');
        $this->loadModel('ApplicationDescriptions');
        $application = $this->Applitions->get($id, [
            'contain' => [
                'CandidateDescriptionValues',
                'ApplicationDescriptionValues' => [
                    'ApplicationDescriptions'
                ],
            ]
        ]);
        $applicationDescriptionIds = $this-applicationDescriptions
            ->find('all')
            ->distinct()
            ->select(['ApplicationDescriptions.id'])
            ->matching(
                'ApplicationDescriptionValues.ApplicationDescriptionValues'
            )
            ->where([
                'ApplicationDescriptionValues.positions_id' => $id,
            ]);
        $applicationDescriptions = $this->applicationDescriptions->find('all')
            ->contain([
                'ApplicationDescriptionValues',
                'ApplicationDescriptionExtras'
            ])
            ->where([
                'ApplicationDescriptions.id IN' => $applicationDescriptionIds,
            ]);
        $user = $this->Users->get(
            $this->Auth->user('id'),
            [
                'contain' => [
                    'Candidates'
                ]
            ]
        );
        if ($this->request->is(['post', 'put'])) {
            $requestData = $this->request->data;
            foreach ($requestData['candidate']['applications'][0]['applications_position_description_values'] as $key => $value) {
                if ($value['positions_description_values_id'] === '') {
                    unset($requestData['candidate']['applications'][0]['applications_position_description_values'][$key]);
                }
            }
            $requestData['candidate']['applications'][0]['application_status_id'] = 1;
            $user = $this->Users->patchEntity($user, $requestData, ['associated' => ['Candidates.Applications.ApplicationsPositionDescriptionValues.ApplsPosDesValuesPosDesExtras']]);
            //debug($user);exit;
            if ($this->Users->save($user, ['associated' => [
                'Candidates',
                'Candidates.Applications',
                'Candidates.Applications.ApplicationsPositionDescriptionValues',
                'Candidates.Applications.ApplicationsPositionDescriptionValues.ApplsPosDesValuesPosDesExtras',
                ]])) {
                $this->Flash->success('Bewerbung gespeichert!');
            }
        }
        $this->set('candidate', $user);
        $this->set('position', $position);
        $this->set('applicationDescriptions', $positionDescriptions);
    }    
   }
}
