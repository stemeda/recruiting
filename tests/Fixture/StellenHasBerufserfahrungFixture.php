<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StellenHasBerufserfahrungFixture
 *
 */
class StellenHasBerufserfahrungFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'stellen_has_berufserfahrung';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'stellen_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'berufserfahrung_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'priotitaet' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_stellen_has_berufserfahrung_berufserfahrung1_idx' => ['type' => 'index', 'columns' => ['berufserfahrung_id'], 'length' => []],
            'fk_stellen_has_berufserfahrung_stellen1_idx' => ['type' => 'index', 'columns' => ['stellen_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['stellen_id', 'berufserfahrung_id'], 'length' => []],
            'fk_stellen_has_berufserfahrung_berufserfahrung1' => ['type' => 'foreign', 'columns' => ['berufserfahrung_id'], 'references' => ['berufserfahrung', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_stellen_has_berufserfahrung_stellen1' => ['type' => 'foreign', 'columns' => ['stellen_id'], 'references' => ['stellen', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'berufserfahrung_id' => 1,
            'priotitaet' => 1,
            'created' => '2016-08-12 14:02:41',
            'modified' => '2016-08-12 14:02:41'
        ],
    ];
}
