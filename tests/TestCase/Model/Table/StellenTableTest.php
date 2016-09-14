<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StellenTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StellenTable Test Case
 */
class StellenTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StellenTable
     */
    public $Stellen;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.stellen',
        'app.abschluesse_has_stellen',
        'app.abschluesse',
        'app.bewerbung',
        'app.bewerbung_status',
        'app.stellen_has_berufserfahrung',
        'app.stellen_has_zusatzqualifikationen'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Stellen') ? [] : ['className' => 'App\Model\Table\StellenTable'];
        $this->Stellen = TableRegistry::get('Stellen', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Stellen);

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
