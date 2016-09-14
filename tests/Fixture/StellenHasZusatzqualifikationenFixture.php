<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StellenHasZusatzqualifikationenFixture
 *
 */
class StellenHasZusatzqualifikationenFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'stellen_has_zusatzqualifikationen';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'stellen_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'zusatzqualifikationen_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'priotitaet' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_stellen_has_zusatzqualifikationen_zusatzqualifikationen1_idx' => ['type' => 'index', 'columns' => ['zusatzqualifikationen_id'], 'length' => []],
            'fk_stellen_has_zusatzqualifikationen_stellen_idx' => ['type' => 'index', 'columns' => ['stellen_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['stellen_id', 'zusatzqualifikationen_id'], 'length' => []],
            'fk_stellen_has_zusatzqualifikationen_stellen' => ['type' => 'foreign', 'columns' => ['stellen_id'], 'references' => ['stellen', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_stellen_has_zusatzqualifikationen_zusatzqualifikationen1' => ['type' => 'foreign', 'columns' => ['zusatzqualifikationen_id'], 'references' => ['zusatzqualifikationen', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'stellen_id' => 1,
            'zusatzqualifikationen_id' => 1,
            'priotitaet' => 1,
            'created' => '2016-08-12 14:02:41',
            'modified' => '2016-08-12 14:02:41'
        ],
    ];
}
