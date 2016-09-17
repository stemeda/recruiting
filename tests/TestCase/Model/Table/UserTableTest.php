<?php

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserTable;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserTable Test Case
 */
class UserTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserTable
     */
    public $User;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user',
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
        $config = TableRegistry::exists('User') ? [] : ['className' => 'App\Model\Table\UserTable'];
        $this->User = TableRegistry::get('User', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->User);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->assertTrue($this->User->hasBehavior('Timestamp'), 'Behavior Timestamp not loaded');
        $this->assertTrue($this->User->hasBehavior('Search'), 'Behavior Search not loaded');
        $this->assertTrue($this->User->association('OpenRegistrations') instanceof \Cake\ORM\Association\HasOne, 'Table not associated with OpenRegistrations');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $validator = $this->User->validator();
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
        $query = $this->User->find('backend');
        $this->assertEquals(2, $query->count());
    }

    /**
     * Test findBackend method
     */
    public function testFindFrontend()
    {
        $query = $this->User->find('frontend');
        $this->assertEquals(1, $query->count());
    }

    /**
     * Test activateAfterRegistration method
     */
    public function testActivateAfterRegistration()
    {
        $newUser = $this->User->newEntity([
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
        $newUser = $this->User->save($newUser, ['associated' => ['OpenRegistrations']]);

        $this->User->activateAfterRegistration($newUser);

        $userAfterRegistration = $this->User->get($newUser->id, ['contain' => ['OpenRegistrations']]);

        $this->assertTrue($userAfterRegistration->active);
        $this->assertNull($userAfterRegistration->open_registration);
    }
}
