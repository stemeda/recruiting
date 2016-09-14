<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BewerbungFixture
 *
 */
class BewerbungFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'bewerbung';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'stellen_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'abschluesse_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'bewerbung_status_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'vorname' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'nachname' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'email' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'benachrichtigung' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'abschluss_note' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_bewerbung_stellen1_idx' => ['type' => 'index', 'columns' => ['stellen_id'], 'length' => []],
            'fk_bewerbung_abschluesse1_idx' => ['type' => 'index', 'columns' => ['abschluesse_id'], 'length' => []],
            'fk_bewerbung_bewerbung_status1_idx' => ['type' => 'index', 'columns' => ['bewerbung_status_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'stellen_id', 'abschluesse_id', 'bewerbung_status_id'], 'length' => []],
            'fk_bewerbung_abschluesse1' => ['type' => 'foreign', 'columns' => ['abschluesse_id'], 'references' => ['abschluesse', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_bewerbung_bewerbung_status1' => ['type' => 'foreign', 'columns' => ['bewerbung_status_id'], 'references' => ['bewerbung_status', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_bewerbung_stellen1' => ['type' => 'foreign', 'columns' => ['stellen_id'], 'references' => ['stellen', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'stellen_id' => 1,
            'abschluesse_id' => 1,
            'bewerbung_status_id' => 1,
            'vorname' => 'Lorem ipsum dolor sit amet',
            'nachname' => 'Lorem ipsum dolor sit amet',
            'email' => 'Lorem ipsum dolor sit amet',
            'benachrichtigung' => '2016-08-12 14:02:41',
            'abschluss_note' => 1.5,
            'created' => '2016-08-12 14:02:41',
            'modified' => '2016-08-12 14:02:41'
        ],
    ];
}
