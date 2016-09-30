<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicationStatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicationStatusTable Test Case
 */
class ApplicationStatusTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicationStatusTable
     */
    public $ApplicationStatus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.application_status',
        'app.applications'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ApplicationStatus') ? [] : ['className' => 'App\Model\Table\ApplicationStatusTable'];
        $this->ApplicationStatus = TableRegistry::get('ApplicationStatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicationStatus);

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
}
