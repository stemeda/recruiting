<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PositionDescriptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PositionDescriptionsTable Test Case
 */
class PositionDescriptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PositionDescriptionsTable
     */
    public $PositionDescriptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('PositionDescriptions') ? [] : ['className' => 'App\Model\Table\PositionDescriptionsTable'];
        $this->PositionDescriptions = TableRegistry::get('PositionDescriptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PositionDescriptions);

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
