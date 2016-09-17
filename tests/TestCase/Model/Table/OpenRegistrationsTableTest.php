<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OpenRegistrationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OpenRegistrationsTable Test Case
 */
class OpenRegistrationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OpenRegistrationsTable
     */
    public $OpenRegistrations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.open_registrations',
        'app.user'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OpenRegistrations') ? [] : ['className' => 'App\Model\Table\OpenRegistrationsTable'];
        $this->OpenRegistrations = TableRegistry::get('OpenRegistrations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OpenRegistrations);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->assertTrue($this->OpenRegistrations->hasBehavior('Timestamp'), 'Behavior Timestamp not loaded');
        $this->assertTrue($this->OpenRegistrations->association('User') instanceof \Cake\ORM\Association\HasOne, 'Table not associated with User');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $validator = $this->OpenRegistrations->validator();
        $id = $validator->field('id');
        $this->assertEquals('create', $id->isEmptyAllowed());
        $this->assertArrayHasKey('integer', $id->rules());
        $validUntil = $validator->field('valid_until');
        $this->assertFalse($validUntil->isEmptyAllowed());
        $this->assertEquals('create', $validUntil->isPresenceRequired());
        $this->assertArrayHasKey('dateTime', $validUntil->rules());
        $validateKey = $validator->field('validate_key');
        $this->assertFalse($validateKey->isEmptyAllowed());
        $this->assertEquals('create', $validateKey->isPresenceRequired());
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
