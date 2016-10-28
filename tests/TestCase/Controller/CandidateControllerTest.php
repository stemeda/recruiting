<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CandidateController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CandidateController Test Case
 */
class CandidateControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.candidates'
    ];

    /**
     * Test login method
     *
     * @return void
     */
    public function testLoginGet()
    {
        $this->get('/login');
        $this->assertResponseOk();
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testLoginPost()
    {
        $table = \Cake\ORM\TableRegistry::get('Users');
        $user = $table->find()->where(['type' => 'candidate', 'active' => true])->contain('Candidates')->first();
        $user->password = 'test';
        $user = $table->save($user);
        $data = [
            'username' => $user->username,
            'password' => 'test',
        ];
        $this->post('/login', $data);
        $this->assertRedirect('/');
        $this->assertSession($user->toArray(), 'Auth.User');
    }

    /**
     * Test logout method
     *
     * @return void
     */
    public function testLogout()
    {
        $this->get('/logout');
        $this->assertRedirect('/login');
    }

    /**
     * Test register method
     *
     * @return void
     */
    public function testRegister()
    {
        $this->get('/register');
        $this->assertResponseOk();
    }


    /**
     * Test emailInfo method
     *
     * @return void
     */
    public function testEmailInfo()
    {
        $this->get('/candidate/email-info');
        $this->assertResponseOk();
    }

    /**
     * Test email method
     *
     * @return void
     */
    public function testEmail()
    {
        $this->get('/candidate/email');
        $this->assertResponseOk();
    }

    /**
     * Test email method
     *
     * @return void
     */
    public function testDatasecurity()
    {
        $this->get('/candidate/datasecurity');
        $this->assertResponseOk();
    }
}
