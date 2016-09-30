<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CandidateDescriptionValuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CandidateDescriptionValuesTable Test Case
 */
class CandidateDescriptionValuesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CandidateDescriptionValuesTable
     */
    public $CandidateDescriptionValues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.candidate_description_values',
        'app.candidate_descriptions',
        'app.candidates',
        'app.candidates_candidate_description_values',
        'app.positions',
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
        $config = TableRegistry::exists('CandidateDescriptionValues') ? [] : ['className' => 'App\Model\Table\CandidateDescriptionValuesTable'];
        $this->CandidateDescriptionValues = TableRegistry::get('CandidateDescriptionValues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CandidateDescriptionValues);

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
