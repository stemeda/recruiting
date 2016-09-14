<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BewerbungStatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BewerbungStatusTable Test Case
 */
class BewerbungStatusTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BewerbungStatusTable
     */
    public $BewerbungStatus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bewerbung_status',
        'app.bewerbung',
        'app.stellen',
        'app.abschluesse',
        'app.abschluesse_has_stellen'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BewerbungStatus') ? [] : ['className' => 'App\Model\Table\BewerbungStatusTable'];
        $this->BewerbungStatus = TableRegistry::get('BewerbungStatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BewerbungStatus);

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
