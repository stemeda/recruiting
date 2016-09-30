<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CansCanDesValuesCanDesExtrasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CansCanDesValuesCanDesExtrasTable Test Case
 */
class CansCanDesValuesCanDesExtrasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CansCanDesValuesCanDesExtrasTable
     */
    public $CansCanDesValuesCanDesExtras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cans_can_des_values_can_des_extras',
        'app.candidates_candidate_description_values',
        'app.candidates',
        'app.users',
        'app.open_registrations',
        'app.candidate_description_values',
        'app.candidate_descriptions',
        'app.positions',
        'app.positions_candidate_description_values',
        'app.position_description_values',
        'app.position_descriptions',
        'app.applications',
        'app.application_status',
        'app.applications_position_description_values',
        'app.positions_position_description_values',
        'app.candidate_description_extras'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CansCanDesValuesCanDesExtras') ? [] : ['className' => 'App\Model\Table\CansCanDesValuesCanDesExtrasTable'];
        $this->CansCanDesValuesCanDesExtras = TableRegistry::get('CansCanDesValuesCanDesExtras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CansCanDesValuesCanDesExtras);

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
