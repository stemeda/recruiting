<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PositionsCandidateDescriptionValuesFixture
 *
 */
class PositionsCandidateDescriptionValuesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'positions_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'candidate_description_values_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'needed' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'importance' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_positions_has_candidate_description_values_candidate_des_idx' => ['type' => 'index', 'columns' => ['candidate_description_values_id'], 'length' => []],
            'fk_positions_has_candidate_description_values_positions1_idx' => ['type' => 'index', 'columns' => ['positions_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_positions_has_candidate_description_values_candidate_descr1' => ['type' => 'foreign', 'columns' => ['candidate_description_values_id'], 'references' => ['candidate_description_values', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_positions_has_candidate_description_values_positions1' => ['type' => 'foreign', 'columns' => ['positions_id'], 'references' => ['positions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'positions_id' => 1,
            'candidate_description_values_id' => 1,
            'needed' => 1,
            'importance' => 1,
            'created' => '2016-09-27 18:27:23',
            'modified' => '2016-09-27 18:27:23'
        ],
    ];
}
