<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BewerbungHasZusatzqualifikationenFixture
 *
 */
class BewerbungHasZusatzqualifikationenFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'bewerbung_has_zusatzqualifikationen';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'bewerbung_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'zusatzqualifikationen_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_bewerbung_has_zusatzqualifikationen_zusatzqualifikatione_idx' => ['type' => 'index', 'columns' => ['zusatzqualifikationen_id'], 'length' => []],
            'fk_bewerbung_has_zusatzqualifikationen_bewerbung1_idx' => ['type' => 'index', 'columns' => ['bewerbung_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['bewerbung_id', 'zusatzqualifikationen_id'], 'length' => []],
            'fk_bewerbung_has_zusatzqualifikationen_bewerbung1' => ['type' => 'foreign', 'columns' => ['bewerbung_id'], 'references' => ['bewerbung', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_bewerbung_has_zusatzqualifikationen_zusatzqualifikationen1' => ['type' => 'foreign', 'columns' => ['zusatzqualifikationen_id'], 'references' => ['zusatzqualifikationen', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'bewerbung_id' => 1,
            'zusatzqualifikationen_id' => 1,
            'created' => '2016-08-12 14:02:41',
            'modified' => '2016-08-12 14:02:41'
        ],
    ];
}
