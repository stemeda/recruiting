<?php
namespace App\Controller\Backend\Administration;

use App\Controller\Backend\BackendController;
use App\Form\SettingsForm;
use Cake\Core\Configure;

/**
 * User Controller
 *
 * @property \App\Model\Table\UserTable $User
 */
class SettingsController extends AdminController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $settings = new SettingsForm();
        if ($this->request->is('post')) {
            $settings->execute($this->request->data);
        }
        $this->set('settings', $settings);
    }
}
