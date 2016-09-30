<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PositionDescriptionExtrasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PositionDescriptionExtrasTable Test Case
 */
class PositionDescriptionExtrasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PositionDescriptionExtrasTable
     */
    public $PositionDescriptionExtras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.position_description_extras',
        'app.position_descriptions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PositionDescriptionExtras') ? [] : ['className' => 'App\Model\Table\PositionDescriptionExtrasTable'];
        $this->PositionDescriptionExtras = TableRegistry::get('PositionDescriptionExtras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PositionDescriptionExtras);

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
