<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property \Cake\I18n\FrozenTime $reg_date
 * @property int $users_type_id
 *
 * @property \App\Model\Entity\UsersType $users_type
 * @property \App\Model\Entity\AcademicDegree[] $academic_degrees
 * @property \App\Model\Entity\Advisor[] $advisors
 * @property \App\Model\Entity\Award[] $awards
 * @property \App\Model\Entity\Classroom[] $classrooms
 * @property \App\Model\Entity\MainInfo[] $main_infos
 * @property \App\Model\Entity\ProfitionalPosition[] $profitional_positions
 * @property \App\Model\Entity\Publication[] $publications
 * @property \App\Model\Entity\Research[] $researchs
 * @property \App\Model\Entity\Resume[] $resumes
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
        'name' => true,
        'username' => true,
        'password' => true,
        'reg_date' => true,
        'users_type_id' => true,
        'users_type' => true,
        'academic_degrees' => true,
        'advisors' => true,
        'awards' => true,
        'classrooms' => true,
        'main_infos' => true,
        'profitional_positions' => true,
        'publications' => true,
        'researchs' => true,
        'resumes' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
