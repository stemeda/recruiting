<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BewerbungHasZusatzqualifikationenTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BewerbungHasZusatzqualifikationenTable Test Case
 */
class BewerbungHasZusatzqualifikationenTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BewerbungHasZusatzqualifikationenTable
     */
    public $BewerbungHasZusatzqualifikationen;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bewerbung_has_zusatzqualifikationen',
        'app.bewerbung',
        'app.stellen',
        'app.abschluesse',
        'app.abschluesse_has_stellen',
        'app.bewerbung_status',
        'app.zusatzqualifikationen'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BewerbungHasZusatzqualifikationen') ? [] : ['className' => 'App\Model\Table\BewerbungHasZusatzqualifikationenTable'];
        $this->BewerbungHasZusatzqualifikationen = TableRegistry::get('BewerbungHasZusatzqualifikationen', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BewerbungHasZusatzqualifikationen);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
