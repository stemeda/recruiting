<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PositionsPositionDescriptionValuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PositionsPositionDescriptionValuesTable Test Case
 */
class PositionsPositionDescriptionValuesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PositionsPositionDescriptionValuesTable
     */
    public $PositionsPositionDescriptionValues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.positions_position_description_values',
        'app.positions',
        'app.candidate_description_values',
        'app.candidate_descriptions',
        'app.candidates',
        'app.users',
        'app.candidates_candidate_description_values',
        'app.positions_candidate_description_values',
        'app.position_description_values',
        'app.position_descriptions',
        'app.applications',
        'app.application_status',
        'app.applications_position_description_values'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PositionsPositionDescriptionValues') ? [] : ['className' => 'App\Model\Table\PositionsPositionDescriptionValuesTable'];
        $this->PositionsPositionDescriptionValues = TableRegistry::get('PositionsPositionDescriptionValues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PositionsPositionDescriptionValues);

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
