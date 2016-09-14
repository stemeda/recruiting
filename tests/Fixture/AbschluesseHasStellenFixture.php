<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AbschluesseHasStellenFixture
 *
 */
class AbschluesseHasStellenFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'abschluesse_has_stellen';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'abschluesse_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'stellen_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'priotitaet' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_abschluesse_has_stellen_stellen1_idx' => ['type' => 'index', 'columns' => ['stellen_id'], 'length' => []],
            'fk_abschluesse_has_stellen_abschluesse1_idx' => ['type' => 'index', 'columns' => ['abschluesse_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['abschluesse_id', 'stellen_id'], 'length' => []],
            'fk_abschluesse_has_stellen_abschluesse1' => ['type' => 'foreign', 'columns' => ['abschluesse_id'], 'references' => ['abschluesse', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_abschluesse_has_stellen_stellen1' => ['type' => 'foreign', 'columns' => ['stellen_id'], 'references' => ['stellen', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'abschluesse_id' => 1,
            'stellen_id' => 1,
            'priotitaet' => 1,
            'created' => '2016-08-12 14:02:41',
            'modified' => '2016-08-12 14:02:41'
        ],
    ];
}
