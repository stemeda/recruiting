<?php
namespace App\Test\TestCase\Controller;

use App\Controller\BewerbungController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\BewerbungController Test Case
 */
class BewerbungControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bewerbung',
        'app.stellen',
        'app.abschluesse_has_stellen',
        'app.abschluesse',
        'app.stellen_has_berufserfahrung',
        'app.berufserfahrung',
        'app.stellen_has_zusatzqualifikationen',
        'app.zusatzqualifikationen',
        'app.bewerbung_has_zusatzqualifikationen',
        'app.bewerbung_status'
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
