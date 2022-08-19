<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HomepageContent Entity
 *
 * @property int $id
 * @property string|null $title1
 * @property string|null $paragraph1
 * @property string|null $image1
 * @property string|null $title2
 * @property string|null $paragraph2
 * @property string|null $image2
 * @property string|null $title3
 * @property string|null $paragraph3
 * @property string|null $title4
 * @property string|null $paragraph4
 * @property string|null $image3
 * @property string|null $name1
 * @property string|null $usertype1
 * @property string|null $userdes
 */
class HomepageContent extends Entity
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
        'title1' => true,
        'paragraph1' => true,
        'image1' => true,
        'title2' => true,
        'paragraph2' => true,
        'image2' => true,
        'title3' => true,
        'paragraph3' => true,
        'title4' => true,
        'paragraph4' => true,
        'image3' => true,
        'name1' => true,
        'usertype1' => true,
        'userdes' => true,
    ];
}
