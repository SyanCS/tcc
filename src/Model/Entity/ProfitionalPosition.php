<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProfitionalPosition Entity
 *
 * @property int $id
 * @property string $position_title
 * @property string $institution
 * @property string $descr
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $reg_date
 *
 * @property \App\Model\Entity\User $user
 */
class ProfitionalPosition extends Entity
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
        'position_title' => true,
        'institution' => true,
        'descr' => true,
        'start_date' => true,
        'end_date' => true,
        'user_id' => true,
        'user' => true
    ];
}
