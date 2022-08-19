<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Forum Entity
 *
 * @property int $id
 * @property string $title
 * @property string|null $content
 * @property \Cake\I18n\FrozenTime $postTime
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Comment[] $comments
 */
class Forum extends Entity
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
        'title' => true,
        'content' => true,
        'postTime' => true,
        'user_id' => true,
        'user' => true,
        'comments' => true,
        'approved'=>true,
    ];
}
