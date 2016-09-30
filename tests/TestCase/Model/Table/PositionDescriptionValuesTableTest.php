<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PositionDescriptionValuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PositionDescriptionValuesTable Test Case
 */
class PositionDescriptionValuesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PositionDescriptionValuesTable
     */
    public $PositionDescriptionValues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.position_description_values',
        'app.position_descriptions',
        'app.applications',
        'app.candidates',
        'app.users',
        'app.candidate_description_values',
        'app.candidate_descriptions',
        'app.candidates_candidate_description_values',
        'app.positions',
        'app.positions_candidate_description_values',
        'app.application_status',
        'app.applications_position_description_values',
        'app.positions_position_description_values'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PositionDescriptionValues') ? [] : ['className' => 'App\Model\Table\PositionDescriptionValuesTable'];
        $this->PositionDescriptionValues = TableRegistry::get('PositionDescriptionValues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PositionDescriptionValues);

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
