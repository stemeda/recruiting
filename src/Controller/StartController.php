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
        $this->loadModel('CandidateDescriptions');
        $this->loadModel('Applications');
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
        $candidateDescriptionIds = $this->CandidateDescriptions
            ->find('all')
            ->distinct()
            ->select(['CandidateDescriptions.id'])
            ->matching(
                'CandidateDescriptionValues.PositionsCandidateDescriptionValues'
            )
            ->where([
                'PositionsCandidateDescriptionValues.positions_id' => $id,
            ]);
        $candidateDescriptions = $this->CandidateDescriptions->find('all')
            ->contain([
                'CandidateDescriptionValues',
                'CandidateDescriptionExtras'
            ])
            ->where([
                'CandidateDescriptions.id IN' => $candidateDescriptionIds,
            ]);
        $user = $this->Users->get(
            $this->Auth->user('id'),
            [
                'contain' => [
                    'Candidates.CandidatesCandidateDescriptionValues.CandidateDescriptionValues.CandidateDescriptions',
                    'Candidates.CandidatesCandidateDescriptionValues.CansCanDesValuesCanDesExtras',
                ]
            ]
        );
        if ($this->request->is(['post', 'put'])) {
            $requestData = $this->request->data;
            $requestData['candidate']['applications'][0]['attachments'] = $requestData['attachments'];
            foreach ($requestData['candidate']['applications'][0]['attachments'] as $attachmentKey => $attachment) {
                if ($attachment['error'] === UPLOAD_ERR_NO_FILE) {
                    unset($requestData['candidate']['applications'][0]['attachments'][$attachmentKey]);
                }
            }
            unset($requestData['attachments']);
            foreach ($requestData['candidate']['applications'][0]['applications_position_description_values'] as $key => $value) {
                if ($value['positions_description_values_id'] === '') {
                    unset($requestData['candidate']['applications'][0]['applications_position_description_values'][$key]);
                }
            }
            foreach ($requestData['candidate']['candidates_candidate_description_values'] as $key => $value) {
                if ($value['candidate_description_values_id'] === '') {
                    unset($requestData['candidate']['candidates_candidate_description_values'][$key]);
                }
            }
            $requestData['candidate']['applications'][0]['application_status_id'] = 1;
            $user = $this->Users->patchEntity(
                $user,
                $requestData,
                [
                    'associated' => [
                        'Candidates.Applications.ApplicationsPositionDescriptionValues.ApplsPosDesValuesPosDesExtras',
                        'Candidates.Applications.Attachments',
                        'Candidates.CandidatesCandidateDescriptionValues.CansCanDesValuesCanDesExtras',
                    ]
                ]
            );
            $this->Applications->setAttachmentsDefaultValues($user->candidate->applications[0]);
            if ($this->Users->save($user, ['associated' => [
                'Candidates',
                'Candidates.Applications',
                'Candidates.Applications.ApplicationsPositionDescriptionValues',
                'Candidates.Applications.ApplicationsPositionDescriptionValues.ApplsPosDesValuesPosDesExtras',
                'Candidates.Applications.Attachments',
                'Candidates.CandidatesCandidateDescriptionValues.CansCanDesValuesCanDesExtras',
                ]])) {
                $this->Flash->success('Bewerbung gespeichert!');
            }
        }
        $this->set('candidate', $user);
        $this->set('position', $position);
        $this->set('positionDescriptions', $positionDescriptions);
        $this->set('candidateDescriptions', $candidateDescriptions);
    }

    /**
     * show all open applications of the current candidate
     *
     * @return void
     */
    public function openApplications()
    {
        $this->loadModel('Applications');
        $applications = $this->Applications
            ->find('all')
            ->contain(['Positions', 'ApplicationStatus'])
            ->where([
                'Applications.candidates_id' => $this->Auth->user('candidate.id')
            ]);
        $this->set('applications', $applications);
    }

    /**
     * cancel a application
     *
     * @param int $id id of the application to cancel
     *
     * @return void
     */
    public function cancel($id = null)
    {
        $this->loadModel('Applications');
        $application = $this->Applications->get($id, ['contain' => ['ApplicationStatus']]);
        if ($application->candidates_id === $this->Auth->user('candidate.id')
            && !$application->application_status->closes_application
        ) {
            $data = [
                'application_status_id' => 4,
            ];
            $application = $this->Applications->patchEntity($application, $data);
            if ($this->Applications->save($application)) {
                $this->Flash->success('Bewerbung zurückgezogen');
            } else {
                $this->Flash->error('Die Bewerbung konnte nicht zurückgezogen werden');
            }
        } else {
            throw new \Cake\Network\Exception\MethodNotAllowedException('Wrong Candidate');
        }
        $this->redirect(['action' => 'openApplications']);
    }
}
