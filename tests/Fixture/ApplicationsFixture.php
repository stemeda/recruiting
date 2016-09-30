<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ApplicationsFixture
 *
 */
class ApplicationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'candidates_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'positions_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'application_status_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'minimal_pay' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'earliest_start' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_applications_candidates1_idx' => ['type' => 'index', 'columns' => ['candidates_id'], 'length' => []],
            'fk_applications_positions1_idx' => ['type' => 'index', 'columns' => ['positions_id'], 'length' => []],
            'fk_applications_application_status1_idx' => ['type' => 'index', 'columns' => ['application_status_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_applications_application_status1' => ['type' => 'foreign', 'columns' => ['application_status_id'], 'references' => ['application_status', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_applications_candidates1' => ['type' => 'foreign', 'columns' => ['candidates_id'], 'references' => ['candidates', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_applications_positions1' => ['type' => 'foreign', 'columns' => ['positions_id'], 'references' => ['positions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'candidates_id' => 1,
            'positions_id' => 1,
            'application_status_id' => 1,
            'minimal_pay' => 1,
            'earliest_start' => '2016-09-27 18:27:13',
            'created' => '2016-09-27 18:27:13',
            'modified' => '2016-09-27 18:27:13'
        ],
    ];
}
