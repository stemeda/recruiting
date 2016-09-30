<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilestoragesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilestoragesTable Test Case
 */
class FilestoragesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FilestoragesTable
     */
    public $Filestorages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.filestorages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Filestorages') ? [] : ['className' => 'App\Model\Table\FilestoragesTable'];
        $this->Filestorages = TableRegistry::get('Filestorages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Filestorages);

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
