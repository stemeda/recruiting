<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ApplsPosDesValuesPosDesExtrasFixture
 *
 */
class ApplsPosDesValuesPosDesExtrasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'applications_position_description_values_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'position_description_extras_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'value' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_category_applications_position_description_values1_idx' => ['type' => 'index', 'columns' => ['applications_position_description_values_id'], 'length' => []],
            'fk_category_position_description_extras1_idx' => ['type' => 'index', 'columns' => ['position_description_extras_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_category_applications_position_description_values1' => ['type' => 'foreign', 'columns' => ['applications_position_description_values_id'], 'references' => ['applications_position_description_values', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_category_position_description_extras1' => ['type' => 'foreign', 'columns' => ['position_description_extras_id'], 'references' => ['position_description_extras', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'applications_position_description_values_id' => 1,
            'position_description_extras_id' => 1,
            'value' => 'Lorem ipsum dolor sit amet',
            'created' => '2016-09-29 12:18:41',
            'modified' => '2016-09-29 12:18:41'
        ],
    ];
}