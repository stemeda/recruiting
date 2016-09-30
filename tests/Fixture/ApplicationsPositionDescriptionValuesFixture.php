<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ApplicationsPositionDescriptionValuesFixture
 *
 */
class ApplicationsPositionDescriptionValuesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'applications_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'positions_description_values_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_applications_has_positions_description_values_positions__idx' => ['type' => 'index', 'columns' => ['positions_description_values_id'], 'length' => []],
            'fk_applications_has_positions_description_values_applicatio_idx' => ['type' => 'index', 'columns' => ['applications_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_applications_has_positions_description_values_applications1' => ['type' => 'foreign', 'columns' => ['applications_id'], 'references' => ['applications', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_applications_has_positions_description_values_positions_de1' => ['type' => 'foreign', 'columns' => ['positions_description_values_id'], 'references' => ['position_description_values', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'applications_id' => 1,
            'positions_description_values_id' => 1,
            'created' => '2016-09-27 18:27:13',
            'modified' => '2016-09-27 18:27:13'
        ],
    ];
}
