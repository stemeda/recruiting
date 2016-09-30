<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplsPosDesValuesPosDesExtrasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplsPosDesValuesPosDesExtrasTable Test Case
 */
class ApplsPosDesValuesPosDesExtrasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplsPosDesValuesPosDesExtrasTable
     */
    public $ApplsPosDesValuesPosDesExtras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.appls_pos_des_values_pos_des_extras',
        'app.applications_position_description_values',
        'app.applications',
        'app.candidates',
        'app.users',
        'app.open_registrations',
        'app.candidate_description_values',
        'app.candidate_descriptions',
        'app.candidates_candidate_description_values',
        'app.positions',
        'app.positions_candidate_description_values',
        'app.position_description_values',
        'app.position_descriptions',
        'app.positions_position_description_values',
        'app.application_status',
        'app.position_description_extras'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ApplsPosDesValuesPosDesExtras') ? [] : ['className' => 'App\Model\Table\ApplsPosDesValuesPosDesExtrasTable'];
        $this->ApplsPosDesValuesPosDesExtras = TableRegistry::get('ApplsPosDesValuesPosDesExtras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplsPosDesValuesPosDesExtras);

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
