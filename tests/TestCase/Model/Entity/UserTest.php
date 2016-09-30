<?php

namespace App\Test\TestCase\Model\Entity;

use App\Model\Entity\User;
use Cake\Auth\DefaultPasswordHasher;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Entity\User Test Case
 */
class UserTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Entity\User
     */
    public $User;

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
        $this->User = new User();
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
    public function testSetPassword()
    {
        $newPassword = 'test';
        $this->User->set('password', $newPassword);
        $this->assertNotEquals($newPassword, $this->User->password);
        $hasher = new DefaultPasswordHasher();
        $check = $hasher->check($newPassword, $this->User->password);
        $this->assertTrue($check);
    }
}
