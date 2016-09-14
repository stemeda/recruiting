<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilestorageTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilestorageTable Test Case
 */
class FilestorageTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FilestorageTable
     */
    public $Filestorage;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.filestorage',
        'app.models'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Filestorage') ? [] : ['className' => 'App\Model\Table\FilestorageTable'];
        $this->Filestorage = TableRegistry::get('Filestorage', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Filestorage);

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
