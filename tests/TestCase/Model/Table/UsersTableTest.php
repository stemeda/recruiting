<?php

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTable
     */
    public $Users;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.open_registrations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Users') ? [] : ['className' => 'App\Model\Table\UsersTable'];
        $this->Users = TableRegistry::get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->assertTrue($this->Users->hasBehavior('Timestamp'), 'Behavior Timestamp not loaded');
        $this->assertTrue($this->Users->hasBehavior('Search'), 'Behavior Search not loaded');
        $this->assertTrue($this->Users->association('OpenRegistrations') instanceof \Cake\ORM\Association\HasOne, 'Table not associated with OpenRegistrations');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $validator = $this->Users->validator();
        $username = $validator->field('username');
        $this->assertFalse($username->isEmptyAllowed());
        $this->assertEquals('create', $username->isPresenceRequired());
        $firstname = $validator->field('firstname');
        $this->assertFalse($firstname->isEmptyAllowed());
        $this->assertEquals('create', $firstname->isPresenceRequired());
        $surname = $validator->field('surname');
        $this->assertFalse($surname->isEmptyAllowed());
        $this->assertEquals('create', $surname->isPresenceRequired());
        $email = $validator->field('email');
        $this->assertFalse($email->isEmptyAllowed());
        $this->assertEquals('create', $email->isPresenceRequired());
        $this->assertArrayHasKey('email', $email->rules());
        $password = $validator->field('password');
        $this->assertFalse($password->isEmptyAllowed());
        $this->assertEquals('create', $password->isPresenceRequired());
        $this->assertArrayHasKey('compare', $password->rules());
        $type = $validator->field('type');
        $this->assertFalse($type->isEmptyAllowed());
        $this->assertEquals('create', $type->isPresenceRequired());
    }

    /**
     * Test findBackend method
     */
    public function testFindBackend()
    {
        $query = $this->Users->find('backend');
        $this->assertEquals(2, $query->count());
    }

    /**
     * Test findBackend method
     */
    public function testFindFrontend()
    {
        $query = $this->Users->find('frontend');
        $this->assertEquals(1, $query->count());
    }

    /**
     * Test activateAfterRegistration method
     */
    public function testActivateAfterRegistration()
    {
        $newUser = $this->Users->newEntity([
            'username' => 'register',
            'firstname' => 'register',
            'surname' => 'register',
            'email' => 'register@example.com',
            'password' => 'register',
            'password_check' => 'register',
            'type' => 'candidate',
            'active' => false,
            'open_registration' => [
                'valid_until' => (new Time())->addDay(5),
                'validate_key' => 'validate_key',
            ]
        ]);
        $newUser = $this->Users->save($newUser, ['associated' => ['OpenRegistrations']]);

        $this->Users->activateAfterRegistration($newUser);

        $userAfterRegistration = $this->Users->get($newUser->id, ['contain' => ['OpenRegistrations']]);

        $this->assertTrue($userAfterRegistration->active);
        $this->assertNull($userAfterRegistration->open_registration);
    }
}
