<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property int $user_id
 * @property string $user_type
 * @property string $user_email
 * @property string|null $user_fname
 * @property string|null $user_lname
 * @property string $user_password
 * @property \Cake\I18n\FrozenTime $registered_timestamp
 * @property string|null $passkey
 * @property \Cake\I18n\FrozenTime|null $timeout
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_type' => true,
        'user_email' => true,
        'user_fname' => true,
        'user_lname' => true,
        'user_password' => true,
        'registered_timestamp' => true,
        'passkey' => true,
        'timeout' => true,
    ];
    protected $_hidden = [
        'user_password'
    ];
    protected function _setUserPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }
}
