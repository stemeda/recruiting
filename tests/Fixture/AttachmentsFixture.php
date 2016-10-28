<?php
/**
 * TechniSat MES : Production and Reparation System of TechniSat (http://technisat.de)
 * Copyright (c) TechniSat Digital GmbH, Daun (Germany)
 *
 *
 * @copyright Copyright (c) TechniSat Digital GmbH, Daun (Germany)
 * @link      https://mes.intranet.daun MES
 * @since     0.1.0
 * @license   proprietary
 * @package MES
 */

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AttachmentsFixture
 *
 */
class AttachmentsFixture extends TestFixture
{

    // @codingStandardsIgnoreStart
    /**
     * Fields
     *
     * @var array
     */
    public $fields = [
        'id' => ['type' => 'uuid', 'null' => false, 'default' => 'newid', 'length' => null, 'precision' => null, 'comment' => null],
        'name' => ['type' => 'string', 'length' => '68', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null],
        'type' => ['type' => 'string', 'length' => '128', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null],
        'size' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null],
        'user_id' => ['type' => 'integer', 'length' => '10', 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'path' => ['type' => 'string', 'length' => '256', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null],
        'model' => ['type' => 'string', 'length' => '128', 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null],
        'foreign_key' => ['type' => 'biginteger', 'length' => '19', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'extension' => ['type' => 'string', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null],
        'hash' => ['type' => 'string', 'length' => '128', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
            'id' => 'D4A46FDB-4F59-4225-9DFC-83C190A24FAE',
            'name' => 'Microsoft Word-Dokument (neu).docx',
            'type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'size' => 0,
            'created' => '2015-08-26 08:25:54',
            'user_id' => 1,
            'path' => 'word.docx',
            'model' => 'Applications',
            'foreign_key' => 12,
            'extension' => 'docx',
            'hash' => 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'
        ],
        [
            'id' => 'EC2E60CA-08B9-40C7-96FA-8EDA6D42ED5A',
            'name' => 'test.jpg',
            'type' => 'image/jpeg',
            'size' => 14612,
            'created' => '2015-08-26 08:25:54',
            'user_id' => 1,
            'path' => 'test.jpg',
            'model' => 'Applications',
            'foreign_key' => 12,
            'extension' => 'jpg',
            'hash' => '69a400d2b5799025eb7ad11e8befc5e0ebf580c8e5203286b3501f1947dcb0bf'
        ],
        [
            'id' => '8A32336F-D56B-4078-80C8-98E206801FA7',
            'name' => 'Microsoft Excel-Arbeitsblatt (neu).xlsx',
            'type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'size' => 8833,
            'created' => '2015-08-26 08:25:54',
            'user_id' => 1,
            'path' => 'Microsoft Excel-Arbeitsblatt (neu).xlsx',
            'model' => 'Applications',
            'foreign_key' => 12,
            'extension' => 'xlsx',
            'hash' => '70032e750546ae56493e91f100a14f614de690a169b802e6071b3d4da13df1bc'
        ],
    ];
}
