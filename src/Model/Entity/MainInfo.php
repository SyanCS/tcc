<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MainInfo Entity
 *
 * @property int $id
 * @property string $photo
 * @property string $name
 * @property string $intro
 * @property string $tel
 * @property string $tel2
 * @property string $email
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $reg_date
 *
 * @property \App\Model\Entity\User $user
 */
class MainInfo extends Entity
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
        'photo' => true,
        'name' => true,
        'intro' => true,
        'tel' => true,
        'tel2' => true,
        'email' => true,
        'user_id' => true,
        'user' => true
    ];
}
