<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Research Entity
 *
 * @property int $id
 * @property string $institution
 * @property string $title
 * @property string $descr
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $reg_date
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ResearchMember[] $research_members
 */
class Research extends Entity
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
        'institution' => true,
        'title' => true,
        'descr' => true,
        'start_date' => true,
        'end_date' => true,
        'user_id' => true,
        'reg_date' => true,
        'user' => true,
        'research_members' => true
    ];
}
