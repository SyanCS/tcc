<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Advisor Entity
 *
 * @property int $id
 * @property string $student
 * @property string $institution
 * @property string $coadvisor
 * @property string $year
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $reg_date
 *
 * @property \App\Model\Entity\User $user
 */
class Advisor extends Entity
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
        'student' => true,
        'institution' => true,
        'coadvisor' => true,
        'year' => true,
        'user_id' => true,
        'user' => true
    ];
}
