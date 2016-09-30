<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'username' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'firstname' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'surname' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'email' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'renew_passwort' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'type' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'active' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
            'username' => 'admin',
            'firstname' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'admin',
            'type' => 'admin',
            'active' => 1,
            'created' => '2016-09-15 19:27:22',
            'modified' => '2016-09-15 19:27:22'
        ],
        [
            'username' => 'recruiter',
            'firstname' => 'recruiter',
            'surname' => 'recruiter',
            'email' => 'recruiter@example.com',
            'password' => 'recruiter',
            'type' => 'recruiter',
            'active' => 1,
            'created' => '2016-09-15 19:27:22',
            'modified' => '2016-09-15 19:27:22'
        ],
        [
            'username' => 'candidate',
            'firstname' => 'candidate',
            'surname' => 'candidate',
            'email' => 'candidate@example.com',
            'password' => 'candidate',
            'type' => 'candidate',
            'active' => 1,
            'created' => '2016-09-15 19:27:22',
            'modified' => '2016-09-15 19:27:22'
        ],
        [
            'username' => 'adminNotActive',
            'firstname' => 'adminNotActive',
            'surname' => 'adminNotActive',
            'email' => 'adminNotActive@example.com',
            'password' => 'adminNotActive',
            'type' => 'admin',
            'active' => 0,
            'created' => '2016-09-15 19:27:22',
            'modified' => '2016-09-15 19:27:22'
        ],
        [
            'username' => 'recruiterNotActive',
            'firstname' => 'recruiterNotActive',
            'surname' => 'recruiterNotActive',
            'email' => 'recruiterNotActive@example.com',
            'password' => 'recruiterNotActive',
            'type' => 'recruiter',
            'active' => 0,
            'created' => '2016-09-15 19:27:22',
            'modified' => '2016-09-15 19:27:22'
        ],
        [
            'username' => 'candidateNotActive',
            'firstname' => 'candidateNotActive',
            'surname' => 'candidateNotActive',
            'email' => 'candidateNotActive@example.com',
            'password' => 'candidate',
            'type' => 'candidate',
            'active' => 0,
            'created' => '2016-09-15 19:27:22',
            'modified' => '2016-09-15 19:27:22'
        ],
    ];
}
