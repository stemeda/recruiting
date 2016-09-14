<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AbschluesseHasStellenTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AbschluesseHasStellenTable Test Case
 */
class AbschluesseHasStellenTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AbschluesseHasStellenTable
     */
    public $AbschluesseHasStellen;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.abschluesse_has_stellen',
        'app.abschluesse',
        'app.bewerbung',
        'app.stellen'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AbschluesseHasStellen') ? [] : ['className' => 'App\Model\Table\AbschluesseHasStellenTable'];
        $this->AbschluesseHasStellen = TableRegistry::get('AbschluesseHasStellen', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AbschluesseHasStellen);

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
