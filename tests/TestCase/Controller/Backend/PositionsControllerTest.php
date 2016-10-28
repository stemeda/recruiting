<?php
namespace App\Test\TestCase\Controller\Backend;

use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CandidateController Test Case
 */
class PositionsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.positions',
        'app.candidate_description_values',
        'app.candidate_descriptions',
        'app.candidate_description_extras',
        'app.cans_can_des_values_can_des_extras',
        'app.candidates_candidate_description_values',
        'app.candidates',
        'app.users',
        'app.open_registrations',
        'app.applications',
        'app.application_status',
        'app.applications_position_description_values',
        'app.position_description_values',
        'app.position_descriptions',
        'app.position_description_extras',
        'app.appls_pos_des_values_pos_des_extras',
        'app.positions_position_description_values',
        'app.positions_candidate_description_values',
        'app.Attachments'
    ];

    /**
     * Test login method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/backend/');
        $this->assertRedirect('/backend/login');
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testIndexWithSessionAdmin()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'admin',
                    'firstname' => 'admin',
                    'surname' => 'admin',
                    'email' => 'example@example.com',
                    'renew_password' => null,
                    'type' => 'admin',
                    'active' => true,
                ],
            ],
        ]);
        $this->get('/backend/');
        $this->assertResponseOk();
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testIndexWithSessionRecruiter()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'recruiter',
                    'firstname' => 'recruiter',
                    'surname' => 'recruiter',
                    'email' => 'example@example.com',
                    'renew_password' => null,
                    'type' => 'recruiter',
                    'active' => true,
                ],
            ],
        ]);
        $this->get('/backend/');
        $this->assertResponseOk();
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testApplications()
    {
        $this->get('/backend/positions/applications/1');
        $this->assertRedirect('/backend/login');
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testApplicationsWithSessionAdmin()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'admin',
                    'firstname' => 'admin',
                    'surname' => 'admin',
                    'email' => 'example@example.com',
                    'renew_password' => null,
                    'type' => 'admin',
                    'active' => true,
                ],
            ],
        ]);
        $this->get('/backend/positions/applications/1');
        $this->assertResponseOk();
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testApplicationsWithSessionRecruiter()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'recruiter',
                    'firstname' => 'recruiter',
                    'surname' => 'recruiter',
                    'email' => 'example@example.com',
                    'renew_password' => null,
                    'type' => 'recruiter',
                    'active' => true,
                ],
            ],
        ]);
        $this->get('/backend/positions/applications/1');
        $this->assertResponseOk();
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testApplicationView()
    {
        $this->get('/backend/positions/application-view/1');
        $this->assertRedirect('/backend/login');
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testApplicationViewWithSessionAdmin()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'admin',
                    'firstname' => 'admin',
                    'surname' => 'admin',
                    'email' => 'example@example.com',
                    'renew_password' => null,
                    'type' => 'admin',
                    'active' => true,
                ],
            ],
        ]);
        $this->get('/backend/positions/application-view/1');
        $this->assertResponseOk();
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testApplicationViewWithSessionRecruiter()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'recruiter',
                    'firstname' => 'recruiter',
                    'surname' => 'recruiter',
                    'email' => 'example@example.com',
                    'renew_password' => null,
                    'type' => 'recruiter',
                    'active' => true,
                ],
            ],
        ]);
        $this->get('/backend/positions/application-view/1');
        $this->assertResponseOk();
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get('/backend/positions/add');
        $this->assertRedirect('/backend/login');
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testAddWithSessionAdmin()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'admin',
                    'firstname' => 'admin',
                    'surname' => 'admin',
                    'email' => 'example@example.com',
                    'renew_password' => null,
                    'type' => 'admin',
                    'active' => true,
                ],
            ],
        ]);
        $this->get('/backend/positions/add');
        $this->assertResponseOk();
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testAddWithSessionRecruiter()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'recruiter',
                    'firstname' => 'recruiter',
                    'surname' => 'recruiter',
                    'email' => 'example@example.com',
                    'renew_password' => null,
                    'type' => 'recruiter',
                    'active' => true,
                ],
            ],
        ]);
        $this->get('/backend/positions/add');
        $this->assertResponseOk();
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get('/backend/positions/edit/1');
        $this->assertRedirect('/backend/login');
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testEditWithSessionAdmin()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'admin',
                    'firstname' => 'admin',
                    'surname' => 'admin',
                    'email' => 'example@example.com',
                    'renew_password' => null,
                    'type' => 'admin',
                    'active' => true,
                ],
            ],
        ]);
        $this->get('/backend/positions/edit/1');
        $this->assertResponseOk();
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testEditWithSessionRecruiter()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'recruiter',
                    'firstname' => 'recruiter',
                    'surname' => 'recruiter',
                    'email' => 'example@example.com',
                    'renew_password' => null,
                    'type' => 'recruiter',
                    'active' => true,
                ],
            ],
        ]);
        $this->get('/backend/positions/edit/1');
        $this->assertResponseOk();
    }
}
