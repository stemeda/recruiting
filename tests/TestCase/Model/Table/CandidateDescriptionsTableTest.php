<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CandidateDescriptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CandidateDescriptionsTable Test Case
 */
class CandidateDescriptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CandidateDescriptionsTable
     */
    public $CandidateDescriptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('CandidateDescriptions') ? [] : ['className' => 'App\Model\Table\CandidateDescriptionsTable'];
        $this->CandidateDescriptions = TableRegistry::get('CandidateDescriptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CandidateDescriptions);

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
