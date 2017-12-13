<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Publication Entity
 *
 * @property int $id
 * @property string $title
 * @property string $intro
 * @property \Cake\I18n\FrozenDate $date
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $reg_date
 * @property string $publication_link
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\PublicationParticipant[] $publication_participants
 */
class Publication extends Entity
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
        'intro' => true,
        'date' => true,
        'user_id' => true,
        'publication_link' => true,
        'user' => true,
        'publication_participants' => true
    ];
}
