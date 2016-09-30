<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CandidatesCandidateDescriptionValuesFixture
 *
 */
class CandidatesCandidateDescriptionValuesFixture extends TestFixture
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
        'candidate_description_values_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_candidates_has_candidate_description_values_candidate_de_idx' => ['type' => 'index', 'columns' => ['candidate_description_values_id'], 'length' => []],
            'fk_candidates_has_candidate_description_values_candidates1_idx' => ['type' => 'index', 'columns' => ['candidates_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_candidates_has_candidate_description_values_candidate_desc1' => ['type' => 'foreign', 'columns' => ['candidate_description_values_id'], 'references' => ['candidate_description_values', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_candidates_has_candidate_description_values_candidates1' => ['type' => 'foreign', 'columns' => ['candidates_id'], 'references' => ['candidates', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'candidate_description_values_id' => 1,
            'created' => '2016-09-27 18:27:13',
            'modified' => '2016-09-27 18:27:13'
        ],
    ];
}
