<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BerufserfahrungTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BerufserfahrungTable Test Case
 */
class BerufserfahrungTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BerufserfahrungTable
     */
    public $Berufserfahrung;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.berufserfahrung',
        'app.stellen_has_berufserfahrung'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Berufserfahrung') ? [] : ['className' => 'App\Model\Table\BerufserfahrungTable'];
        $this->Berufserfahrung = TableRegistry::get('Berufserfahrung', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Berufserfahrung);

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
