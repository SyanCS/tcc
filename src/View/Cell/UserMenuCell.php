<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * UserMenu cell
 */
class UserMenuCell extends Cell
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
        $type = $loggedUser['users_type_id'];
        $this->set('type',$type);
    }
}
