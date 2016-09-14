<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StellenHasZusatzqualifikationenTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StellenHasZusatzqualifikationenTable Test Case
 */
class StellenHasZusatzqualifikationenTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StellenHasZusatzqualifikationenTable
     */
    public $StellenHasZusatzqualifikationen;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.stellen_has_zusatzqualifikationen',
        'app.stellen',
        'app.abschluesse_has_stellen',
        'app.abschluesse',
        'app.bewerbung',
        'app.bewerbung_status',
        'app.stellen_has_berufserfahrung',
        'app.berufserfahrung',
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
        $config = TableRegistry::exists('StellenHasZusatzqualifikationen') ? [] : ['className' => 'App\Model\Table\StellenHasZusatzqualifikationenTable'];
        $this->StellenHasZusatzqualifikationen = TableRegistry::get('StellenHasZusatzqualifikationen', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StellenHasZusatzqualifikationen);

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
