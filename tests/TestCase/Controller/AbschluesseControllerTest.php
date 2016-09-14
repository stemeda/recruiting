<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AbschluesseController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AbschluesseController Test Case
 */
class AbschluesseControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.abschluesse',
        'app.abschluesse_has_stellen',
        'app.stellen',
        'app.bewerbung',
        'app.bewerbung_status',
        'app.stellen_has_berufserfahrung',
        'app.berufserfahrung',
        'app.stellen_has_zusatzqualifikationen',
        'app.zusatzqualifikationen',
        'app.bewerbung_has_zusatzqualifikationen'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
