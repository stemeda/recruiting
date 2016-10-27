<?php

namespace App\Controller\Backend;

use App\Model\Entity\Application;
use App\Model\Entity\Position;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

/**
 * Positions Controller
 *
 * @property \App\Model\Table\PositionsTable $applications
 */
class PositionsController extends BackendController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null|void
     */
    public function index()
    {
        $positions = $this->paginate($this->Positions);

        $this->set(compact('positions'));
        $this->set('_serialize', ['positions']);
    }


    /**
     * applications method
     *
     * @param string|null $id Position id.
     * @return \Cake\Network\Response|null|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function applications($id = null)
    {
        $applications = TableRegistry::get('Applications')
                ->find('all')
                ->contain('ApplicationsPositionDescriptionValues')
                ->contain('ApplicationStatus')
                ->contain('Candidates.CandidatesCandidateDescriptionValues')
                ->contain('Candidates.Users')
                ->where([
                    'positions_id' => $id,
                    'ApplicationStatus.closes_application' => false
                ]);
        $position = $this->Positions->get(
            $id,
            [
                'contain' => [
                    'PositionsPositionDescriptionValues',
                    'PositionsCandidateDescriptionValues',
                ]
            ]
        );
        $valuesAllNeestedSet = [];
        $valuesNotAllNeestedSet = [];
        foreach ($applications as $applicationKey => $application) {
            $result = $this->_calculateApplicationValue($application, $position);
            if ($result['allNeededSet']) {
                $valuesAllNeestedSet[$applicationKey] = $result;
            } else {
                $valuesNotAllNeestedSet[$applicationKey] = $result;
            }
        }
        $valuesAllNeestedSet = \Cake\Utility\Hash::sort($valuesAllNeestedSet, '{n}.value', 'desc', 'numeric');
        $valuesNotAllNeestedSet = \Cake\Utility\Hash::sort($valuesNotAllNeestedSet, '{n}.value', 'desc', 'numeric');
        $this->set('valuesAllNeestedSet', $valuesAllNeestedSet);
        $this->set('valuesNotAllNeestedSet', $valuesNotAllNeestedSet);
    }

    /**
     * applicationView method
     *
     * @param string|null $id application id.
     * @return \Cake\Network\Response|null|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function applicationView($id = null)
    {
        $application = TableRegistry::get('Applications')
                ->find('all')
                ->contain('ApplicationsPositionDescriptionValues.PositionDescriptionValues.PositionDescriptions')
                ->contain('ApplicationsPositionDescriptionValues.ApplsPosDesValuesPosDesExtras.PositionDescriptionExtras')
                ->contain('ApplicationStatus')
                ->contain('Candidates.CandidatesCandidateDescriptionValues.CandidateDescriptionValues.CandidateDescriptions')
                ->contain('Candidates.CandidatesCandidateDescriptionValues.CansCanDesValuesCanDesExtras.CandidateDescriptionExtras')
                ->contain('Candidates.Users')
                ->contain('Attachments')
                ->where([
                    'Applications.id' => $id,
                    'ApplicationStatus.closes_application' => false
                ])
                ->first();
        $this->set('application', $application);
    }

    /**
     * calculate the value of an application out of the position.
     * returns the main Information of the position and the value
     *
     * @param Application $application the application
     * @param Position $position the position
     * @return array
     */
    protected function _calculateApplicationValue(Application $application, Position $position)
    {
        $result = [
            'value' => 0,
            'application' => $application,
            'position' => $position,
            'allNeededSet' => true,
        ];
        foreach ($position->positions_candidate_description_values as $key => $positionsCandidateDescriptionValue) {
            $candidatesCandidateDescriptionValues = $application->candidate->candidates_candidate_description_values;
            $found = false;
            foreach ($candidatesCandidateDescriptionValues as $candidatesCandidateDescriptionValue) {
                if ($candidatesCandidateDescriptionValue->candidate_description_values_id === $positionsCandidateDescriptionValue->candidate_description_values_id) {
                    $found = true;
                    $result['value'] += $positionsCandidateDescriptionValue->importance;
                }
                if (!$found && $positionsCandidateDescriptionValue->needed) {
                    $result['allNeededSet'] = false;
                }
            }
        }
        foreach ($position->positions_position_description_values as $key => $positionsPositionDescriptionValues) {
            $applicationPositionDescriptionValues = $application->applications_position_description_values;
            $found = false;
            foreach ($applicationPositionDescriptionValues as $applicationPositionDescriptionValue) {
                if ($applicationPositionDescriptionValue->positions_description_values_id === $positionsPositionDescriptionValues->positions_description_values_id) {
                    $found = true;
                    $result['value'] += $positionsPositionDescriptionValues->importance;
                }
                if (!$found && $positionsPositionDescriptionValues->needed) {
                    $result['allNeededSet'] = false;
                }
            }
        }

        return $result;
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $position = $this->Positions->newEntity();
        if ($this->request->is('post')) {
            $position = $this->Positions->patchEntity($position, $this->request->data);

            if ($this->Positions->save($position, ['associated' => ['PositionsPositionDescriptionValues', 'PositionsCandidateDescriptionValues']])) {
                $this->Flash->success('Der Datensatz wurde gespeichert.');

                return $this->redirect(['action' => 'index']);
            } else {
                debug($position);
                $this->Flash->error('Der Datensatz konnte nicht gespeichert werden. Bitte versucen Sie es erneut.');
            }
        }
        //$candidateDescriptionValues = $this->Positions->CandidateDescriptionValues->find('list', ['limit' => 200]);
        $positionDescriptions = \Cake\ORM\TableRegistry::get('PositionDescriptions')->find('all')->contain(['PositionDescriptionValues']);
        $candidateDescriptions = \Cake\ORM\TableRegistry::get('CandidateDescriptions')->find('all')->contain(['CandidateDescriptionValues']);
        $this->set(compact('position', 'positionDescriptions', 'candidateDescriptions'));
        $this->set('_serialize', ['position']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Position id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $position = $this->Positions->get(
            $id,
            [
                'contain' => [
                    'PositionsPositionDescriptionValues',
                    'PositionsCandidateDescriptionValues'
                ]
            ]
        );
        if ($this->request->is('post')) {
            $position = $this->Positions->patchEntity($position, $this->request->data);

            if ($this->Positions->save($position, ['associated' => ['PositionsPositionDescriptionValues', 'PositionsCandidateDescriptionValues']])) {
                $this->Flash->success('Der Datensatz wurde gespeichert.');

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Der Datensatz konnte nicht gespeichert werden. Bitte versucen Sie es erneut.');
            }
        }
        //$candidateDescriptionValues = $this->Positions->CandidateDescriptionValues->find('list', ['limit' => 200]);
        $positionDescriptions = \Cake\ORM\TableRegistry::get('PositionDescriptions')->find('all')->contain(['PositionDescriptionValues']);
        $candidateDescriptions = \Cake\ORM\TableRegistry::get('CandidateDescriptions')->find('all')->contain(['CandidateDescriptionValues']);
        $this->set(compact('position', 'positionDescriptions', 'candidateDescriptions'));
        $this->set('_serialize', ['position']);
    }

    /**
     * invite a application
     *
     * @param int $id id of the application to cancel
     *
     * @return void
     */
    public function invite($id = null)
    {
        $this->loadModel('Applications');
        $application = $this->Applications->get($id, ['contain' => ['Candidates.Users']]);

        $data = [
            'application_status_id' => 3,
        ];
        $applicationPatched = $this->Applications->patchEntity($application, $data);
        if ($this->Applications->save($applicationPatched)) {
            $email = new Email();
            $t = $email->template('invite', 'default')
                ->emailFormat('both')
                ->to($application->candidate->user->email)
                ->subject('Einladung zum Vorstellungsgespräch')
                ->send();
            $this->Flash->success('Bewerber eingeladen');
        } else {
            $this->Flash->error('Der Bewerber konnte nicht eingeladen werden');
        }
        $this->redirect(['action' => 'applications', $application->positions_id]);
    }

    /**
     * invite a application
     *
     * @param int $id id of the application to cancel
     *
     * @return void
     */
    public function accept($id = null)
    {
        $this->loadModel('Applications');
        $application = $this->Applications->get($id, ['contain' => ['Candidates.Users']]);
        $data = [
            'application_status_id' => 5,
        ];
        $applicationPatched = $this->Applications->patchEntity($application, $data);
        if ($this->Applications->save($applicationPatched)) {
            $email = new Email();
            $t = $email->template('accept', 'default')
                ->emailFormat('both')
                ->to($application->candidate->user->email)
                ->subject('Zusage Stelle')
                ->send();
            $this->Flash->success('Bewerber eingestellt');
        } else {
            $this->Flash->error('Es ist ein Fehler aufgetreten.');
        }
        $this->redirect(['action' => 'applications', $application->positions_id]);
    }

    /**
     * invite a application
     *
     * @param int $id id of the application to cancel
     *
     * @return void
     */
    public function cancel($id = null)
    {
        $this->loadModel('Applications');
        $application = $this->Applications->get($id, ['contain' => ['Candidates.Users']]);
        $data = [
            'application_status_id' => 2,
        ];
        $applicationPatched = $this->Applications->patchEntity($application, $data);
        if ($this->Applications->save($applicationPatched)) {
            $email = new Email();
            $t = $email->template('cancel', 'default')
                ->emailFormat('both')
                ->to($application->candidate->user->email)
                ->subject('Absage Bewerbung')
                ->send();
            $this->Flash->success('Absage verschickt');
        } else {
            $this->Flash->error('Es konnte keine Absage verschickt werden.');
        }
        $this->redirect(['action' => 'applications', $application->positions_id]);
    }
}
