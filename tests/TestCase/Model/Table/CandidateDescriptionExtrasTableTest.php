<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CandidateDescriptionExtrasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CandidateDescriptionExtrasTable Test Case
 */
class CandidateDescriptionExtrasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CandidateDescriptionExtrasTable
     */
    public $CandidateDescriptionExtras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.candidate_description_extras',
        'app.candidate_descriptions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CandidateDescriptionExtras') ? [] : ['className' => 'App\Model\Table\CandidateDescriptionExtrasTable'];
        $this->CandidateDescriptionExtras = TableRegistry::get('CandidateDescriptionExtras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CandidateDescriptionExtras);

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
