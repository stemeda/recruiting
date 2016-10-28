<?php
namespace App\Test\TestCase\Controller\Backend;

use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CandidateController Test Case
 */
class UserControllerTest extends IntegrationTestCase
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
        $this->get('/backend/login');
        $this->assertResponseOk();
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testLoginPostAdmin()
    {
        $table = \Cake\ORM\TableRegistry::get('Users');
        $user = $table->find()->where(['type' => 'admin', 'active' => true])->first();
        $user->password = 'test';
        $user = $table->save($user);
        $data = [
            'username' => $user->username,
            'password' => 'test',
        ];
        $this->post('/backend/login', $data);
        $this->assertRedirect('/backend/start');
        $this->assertSession($user->toArray(), 'Auth.User');
    }

    /**
     * Test login method
     *
     * @return void
     */
    public function testLoginPostREcruiter()
    {
        $table = \Cake\ORM\TableRegistry::get('Users');
        $user = $table->find()->where(['type' => 'recruiter', 'active' => true])->first();
        $user->password = 'test';
        $user = $table->save($user);
        $data = [
            'username' => $user->username,
            'password' => 'test',
        ];
        $this->post('/backend/login', $data);
        $this->assertRedirect('/backend/start');
        $this->assertSession($user->toArray(), 'Auth.User');
    }

    /**
     * Test logout method
     *
     * @return void
     */
    public function testLogout()
    {
        $this->get('/backend/logout');
        $this->assertRedirect('/backend/login');
    }
}
