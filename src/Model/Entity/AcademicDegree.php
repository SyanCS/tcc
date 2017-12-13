<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AcademicDegree Entity
 *
 * @property int $id
 * @property string $degree
 * @property string $institution
 * @property string $title
 * @property string $descr
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $reg_date
 *
 * @property \App\Model\Entity\User $user
 */
class AcademicDegree extends Entity
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
        'degree' => true,
        'institution' => true,
        'title' => true,
        'descr' => true,
        'start_date' => true,
        'end_date' => true,
        'user_id' => true,
        'user' => true
    ];


   /* public function _getStart_date(){

        if(!$this->_new){
            $start_date = $this->_properties['start_date'];
            return date('d/m/Y', strtotime($start_date));
        }

    }

    public function _getEnd_date(){

        //dump($this);exit;
        if(!$this->_new){
            $end_date = $this->_properties['end_date'];
            return date('d/m/Y', strtotime($end_date));
        }

    }*/

}
