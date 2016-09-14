<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AbschluesseTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AbschluesseTable Test Case
 */
class AbschluesseTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AbschluesseTable
     */
    public $Abschluesse;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.abschluesse',
        'app.abschluesse_has_stellen',
        'app.bewerbung'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Abschluesse') ? [] : ['className' => 'App\Model\Table\AbschluesseTable'];
        $this->Abschluesse = TableRegistry::get('Abschluesse', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Abschluesse);

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
