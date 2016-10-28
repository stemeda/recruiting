<?php
namespace App\Test\TestCase\Controller;

use App\Controller\StartController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\StartController Test Case
 */
class StartControllerTest extends IntegrationTestCase
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
        'app.positions_candidate_description_values'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/');
        $this->assertResponseOk();
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/stelle/1');
        $this->assertResponseOk();
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testApplicate()
    {
        $this->get('/applicate/1');
        $this->assertRedirect('/login');
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testApplicateWithSession()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'candidate',
                    'firstname' => 'candidate',
                    'surname' => 'candidate',
                    'email' => 'example@example.com',
                    'renew_password' => null,
                    'type' => 'candidate',
                    'active' => true,
                    'candidate' => [
                        'id' => 1,
                        'user_id' => 1,
                        'street' => 'example street',
                        'zip' => 4711,
                        'city' => 'city',
                        'mobile' => '00558415284',
                        'phone' => '0055451384'
                    ],
                ],
            ],
        ]);
        $this->get('/applicate/1');
        $this->assertResponseOk();
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testOpenApplications()
    {
        $this->get('/start/open-applications');
        $this->assertRedirect('/login');
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testOpenApplicationsWithSession()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'candidate',
                    'firstname' => 'candidate',
                    'surname' => 'candidate',
                    'email' => 'example@example.com',
                    'renew_password' => null,
                    'type' => 'candidate',
                    'active' => true,
                    'candidate' => [
                        'id' => 1,
                        'user_id' => 1,
                        'street' => 'example street',
                        'zip' => 4711,
                        'city' => 'city',
                        'mobile' => '00558415284',
                        'phone' => '0055451384'
                    ],
                ],
            ],
        ]);
        $this->get('/start/open-applications');
        $this->assertResponseOk();
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testCancel()
    {
        $this->get('/cancel/1');
        $this->assertRedirect('/login');
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testCancelWithSession()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'candidate',
                    'firstname' => 'candidate',
                    'surname' => 'candidate',
                    'email' => 'example@example.com',
                    'renew_password' => null,
                    'type' => 'candidate',
                    'active' => true,
                    'candidate' => [
                        'id' => 1,
                        'user_id' => 1,
                        'street' => 'example street',
                        'zip' => 4711,
                        'city' => 'city',
                        'mobile' => '00558415284',
                        'phone' => '0055451384'
                    ],
                ],
            ],
        ]);
        $this->get('/cancel/1');
        $this->assertRedirect('/start/open-applications');
    }
}
