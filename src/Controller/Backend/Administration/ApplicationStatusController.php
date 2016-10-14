<?php

namespace App\Controller\Backend\Administration;

use App\Controller\Backend\BackendController;

class ApplicationStatusController extends BackendController
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

        $this->loadModel('ApplicationStatus'); // Include the FlashComponent
    }

    /**
     * list of all application status
     *
     * @return void
     */
    public function index()
    {
        $this->set('applicationStatus', $this->ApplicationStatus->find('all'));
    }

    /**
     * view a application status
     * @param int $id the of status
     *
     * @return void
     */
    public function view($id)
    {
        $applicationStatus = $this->ApplicationStatus->get($id);
        $this->set(compact('applicationStatus'));
    }

    /**
     * add a application status
     *
     * @return \Cake\Network\Response|null
     */
    public function add()
    {
        $applicationStatus = $this->ApplicationStatus->newEntity();
        if ($this->request->is('post')) {
            $applicationStatus = $this->ApplicationStatus->patchEntity($applicationStatus, $this->request->data);
            if ($this->ApplicationStatus->save($applicationStatus)) {
                $this->Flash->success(__('Your Status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your Status.'));
        }
        $this->set('applicationStatus', $applicationStatus);
    }

    /**
     * edit an application status
     * @param int $id the of status
     *
     * @return \Cake\Network\Response|null
     */
    public function edit($id = null)
    {
        $applicationStatus = $this->ApplicationStatus->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->ApplicationStatus->patchEntity($applicationStatus, $this->request->data);
            if ($this->ApplicationStatus->save($applicationStatus)) {
                $this->Flash->success(__('Your status has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your status.'));
        }

        $this->set('applicationStatus', $applicationStatus);
    }

    /**
     * delete a application status
     * @param int $id the of status
     *
     * @return \Cake\Network\Response|null
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicationStatus = $this->ApplicationStatus->get($id);
        if ($this->ApplicationStatus->delete($applicationStatus)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
