<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PositionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PositionsTable Test Case
 */
class PositionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PositionsTable
     */
    public $PositionsTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.positions',
        'app.candidate_description_values',
        'app.candidate_descriptions',
        'app.candidate_description_extras',
        'app.cans_can_des_values_can_des_extras',
        'app.candidates_candidate_description_values',
        'app.candidates',
        'app.users',
        'app.open_registrations',
        'app.applications',
        'app.application_status',
        'app.applications_position_description_values',
        'app.position_description_values',
        'app.position_descriptions',
        'app.position_description_extras',
        'app.appls_pos_des_values_pos_des_extras',
        'app.positions_position_description_values',
        'app.positions_candidate_description_values'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Positions') ? [] : ['className' => 'App\Model\Table\PositionsTable'];
        $this->PositionsTable = TableRegistry::get('Positions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PositionsTable);

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
