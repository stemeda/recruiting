<?php
namespace App\Test\TestCase\Controller;

use App\Controller\StartController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\StartController Test Case
 */
class StartControllerTest extends IntegrationTestCase
{
    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/');
        $this->assertResponseOk();
    }
}
