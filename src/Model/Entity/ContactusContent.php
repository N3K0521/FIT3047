<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContactusContent Entity
 *
 * @property int $id
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $email
 * @property string|null $opening hours
 */
class ContactusContent extends Entity
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
        'phone' => true,
        'address' => true,
        'email' => true,
        'openinghours' => true,
    ];
}
