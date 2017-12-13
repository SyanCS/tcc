<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * LoggedName cell
 */
class LoggedNameCell extends Cell
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
        $aux = explode(" ", $loggedUser['name']);

        $loggedName = $aux[0]." ".end($aux);

        $this->set('loggedName',$loggedName);
    }

}
