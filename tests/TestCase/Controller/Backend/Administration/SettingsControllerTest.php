<?php
namespace App\Test\TestCase\Controller\Backend\Administration;

use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CandidateController Test Case
 */
class SettingsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.candidates',
        'app.users',
    ];

    /**
     * Test login method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/backend/administration/settings');
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
        $this->get('/backend/administration/settings');
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
        $this->get('/backend/administration/settings/');
        $this->assertRedirect('/backend/start');
    }
}
