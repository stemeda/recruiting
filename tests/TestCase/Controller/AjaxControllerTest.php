<?php
namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\StartController Test Case
 */
class AjaxControllerTest extends IntegrationTestCase
{
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
     * Test index method
     *
     * @return void
     */
    public function testLoadPositionDescriptionView()
    {
        $this->get('/ajax/load-position-description-view/1/1');
        $this->assertResponseOk();
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testLoadCandidateDescriptionView()
    {
        $this->get('/ajax/load-candidate-description-view/1/1');
        $this->assertResponseOk();
    }
}
