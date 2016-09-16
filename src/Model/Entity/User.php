<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher; //include this line
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $type
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class User extends Entity
{

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    /**
     * setter for the password. the password will be hashed
     * @param string $value value of the setter
     * @return string
     */
    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();

        return $hasher->hash($value);
    }

    /**
     * checks if the provided user is an Administrator
     * @param array|null $user check the type user
     * @return bool
     */
    public static function checkAdmin($user)
    {
        return is_array($user) &&
            isset($user['type']) &&
            $user['type'] === 'admin';
    }

    /**
     * checks if the provided user is an Recruiter
     * @param array|null $user check the type user
     * @return bool
     */
    public static function checkRecruiter($user)
    {
        return is_array($user) &&
            isset($user['type']) &&
            $user['type'] === 'recruiter';
    }

    /**
     * checks if the provided user is an Recruiter
     * @param array|null $user check the type user
     * @return bool
     */
    public static function checkBackend($user)
    {
        return is_array($user) && isset($user['type']) && (
                $user['type'] === 'admin' ||
                $user['type'] === 'recruiter'
        );
    }

    /**
     * checks if the provided user is an Recruiter
     * @param array|null $user check the type user
     * @return bool
     */
    public static function checkCandidate($user)
    {
        return is_array($user) &&
            isset($user['type']) &&
            $user['type'] === 'candidate';
    }
}
