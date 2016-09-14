<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ZusatzqualifikationenTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ZusatzqualifikationenTable Test Case
 */
class ZusatzqualifikationenTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ZusatzqualifikationenTable
     */
    public $Zusatzqualifikationen;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.zusatzqualifikationen',
        'app.bewerbung_has_zusatzqualifikationen',
        'app.bewerbung',
        'app.stellen',
        'app.abschluesse_has_stellen',
        'app.abschluesse',
        'app.stellen_has_berufserfahrung',
        'app.berufserfahrung',
        'app.stellen_has_zusatzqualifikationen',
        'app.bewerbung_status'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Zusatzqualifikationen') ? [] : ['className' => 'App\Model\Table\ZusatzqualifikationenTable'];
        $this->Zusatzqualifikationen = TableRegistry::get('Zusatzqualifikationen', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Zusatzqualifikationen);

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
