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
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
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
