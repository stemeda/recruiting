<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StellenHasBerufserfahrungTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StellenHasBerufserfahrungTable Test Case
 */
class StellenHasBerufserfahrungTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StellenHasBerufserfahrungTable
     */
    public $StellenHasBerufserfahrung;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.stellen_has_berufserfahrung',
        'app.stellen',
        'app.abschluesse_has_stellen',
        'app.abschluesse',
        'app.bewerbung',
        'app.bewerbung_status',
        'app.stellen_has_zusatzqualifikationen',
        'app.berufserfahrung'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('StellenHasBerufserfahrung') ? [] : ['className' => 'App\Model\Table\StellenHasBerufserfahrungTable'];
        $this->StellenHasBerufserfahrung = TableRegistry::get('StellenHasBerufserfahrung', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StellenHasBerufserfahrung);

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
