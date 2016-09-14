<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BewerbungTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BewerbungTable Test Case
 */
class BewerbungTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BewerbungTable
     */
    public $Bewerbung;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bewerbung',
        'app.stellen',
        'app.abschluesse',
        'app.abschluesse_has_stellen',
        'app.bewerbung_status'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Bewerbung') ? [] : ['className' => 'App\Model\Table\BewerbungTable'];
        $this->Bewerbung = TableRegistry::get('Bewerbung', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bewerbung);

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
