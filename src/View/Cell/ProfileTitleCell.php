<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * LoggedName cell
 */
class ProfileTitleCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {

        $loggedUser = $_SESSION['Auth']['User'];
        $user_id = $loggedUser['id'];

        $this->loadModel('MainInfos');

        $mainInfo = $this->MainInfos->findByUserId($user_id, [
            'contain' => []
        ])->first();

        $profileName = $mainInfo->name;

        $this->set('profileName',$profileName);
    }

}
