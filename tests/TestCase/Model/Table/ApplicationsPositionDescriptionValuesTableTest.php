<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicationsPositionDescriptionValuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicationsPositionDescriptionValuesTable Test Case
 */
class ApplicationsPositionDescriptionValuesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicationsPositionDescriptionValuesTable
     */
    public $ApplicationsPositionDescriptionValues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applications_position_description_values',
        'app.applications',
        'app.candidates',
        'app.positions',
        'app.application_status',
        'app.position_description_values'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ApplicationsPositionDescriptionValues') ? [] : ['className' => 'App\Model\Table\ApplicationsPositionDescriptionValuesTable'];
        $this->ApplicationsPositionDescriptionValues = TableRegistry::get('ApplicationsPositionDescriptionValues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicationsPositionDescriptionValues);

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
