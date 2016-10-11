<?php
namespace App\Controller\Backend\Administration;

use App\Controller\Backend\BackendController;

class ApplicationStatusController extends BackendController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadModel('ApplicationStatus'); // Include the FlashComponent
    }

    public function index()
    {
        $this->set('application_status', $this->ApplicationStatus->find('all'));
    }

    public function view($id)
    {
        $application_status = $this->ApplicationStatus->get($id);
        $this->set(compact('application_status'));
    }

    public function add()
    {
        $application_status = $this->ApplicationStatus->newEntity();
        if ($this->request->is('post')) {
            $application_status = $this->ApplicationStatus->patchEntity($application_status, $this->request->data);
            if ($this->ApplicationStatus->save($application_status)) {
                $this->Flash->success(__('Your Status has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your Status.'));
        }
        $this->set('application_status', $application_status);
    }
    public function edit($id = null)
{
    $application_status = $this->ApplicationStatus->get($id);
    if ($this->request->is(['post', 'put'])) {
        $this->ApplicationStatus->patchEntity($application_status, $this->request->data);
        if ($this->ApplicationStatus->save($application_status)) {
            $this->Flash->success(__('Your status has been updated.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Unable to update your status.'));
    }

    $this->set('application_status', $application_status);
}
public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $application_status = $this->ApplicationStatus->get($id);
        if ($this->ApplicationStatus->delete($application_status)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}


