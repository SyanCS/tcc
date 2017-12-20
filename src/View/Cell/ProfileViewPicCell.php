<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * ProfileViewPicCell cell
 */
class ProfileViewPicCell extends Cell
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
        //$picDir = ROOT.DS.'webroot'.DS.'img'.DS.'profile_pics'.DS;
        $picDir = '';
        $loggedUser = $_SESSION['Auth']['User'];

        $this->loadModel('MainInfos');
        $main_info = $this->MainInfos->findByUserId($loggedUser['id'])->first();
        if($main_info['photo']){
            $photo = $picDir.$main_info['photo'];
        }else {
            $photo = $picDir.'placeholderpic.png';
        }
        $this->set('photo',$photo);
    }
}
