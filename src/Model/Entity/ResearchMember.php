<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ResearchMember Entity
 *
 * @property int $id
 * @property string $name
 * @property bool $coordinator
 * @property int $research_id
 * @property \Cake\I18n\FrozenTime $reg_date
 *
 * @property \App\Model\Entity\Research $research
 */
class ResearchMember extends Entity
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
        'name' => true,
        'coordinator' => true,
        'research_id' => true,
        'reg_date' => true,
        'research' => true
    ];
}
