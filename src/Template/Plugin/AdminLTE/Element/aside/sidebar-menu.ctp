<?php
use Cake\Core\Configure;

$file = Configure::read('Theme.folder'). DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'sidebar-menu.ctp';
$user_menu = $this->cell('UserMenu');

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview">
        <?= $user_menu ?>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa  fa-smile-o"></i> <span>My Profile</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/users/profile'); ?>"><i class="fa fa-circle-o"></i> View</a></li>
            <!--li><a href="<?php echo $this->Url->build('/users/generate'); ?>"><i class="fa fa-circle-o"></i> Generate Profile</a></li-->
            <!--li><a href="<?php echo $this->Url->build('/users/logout'); ?>"><i class="fa fa-circle-o"></i> Sign out</a></li-->
        </ul>
    </li>
    <li class="header">MY INFOS</li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-info"></i> <span> Intro</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/main-infos/edit'); ?>"><i class="fa fa-circle-o"></i> Edit</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa  fa-graduation-cap"></i> <span>Academic Degrees</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/academic-degrees'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
            <li><a href="<?php echo $this->Url->build('/academic-degrees/add'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa  fa-magic"></i> <span>Advisings</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/advisors'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
            <li><a href="<?php echo $this->Url->build('/advisors/add'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa  fa-trophy"></i> <span>Awards</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/awards'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
            <li><a href="<?php echo $this->Url->build('/awards/add'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-book"></i> <span>Classrooms</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/classrooms'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
            <li><a href="<?php echo $this->Url->build('/classrooms/add'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-university"></i> <span>Profitional Positions</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/profitional-positions'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
            <li><a href="<?php echo $this->Url->build('/profitional-positions/add'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>Publications</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/publications'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
            <li><a href="<?php echo $this->Url->build('/publications/add'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-group"></i> <span>Researchs</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/researchs'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
            <li><a href="<?php echo $this->Url->build('/researchs/add'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-file-text"></i> <span>Resumes</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/resumes/upload'); ?>"><i class="fa fa-circle-o"></i> Upload</a></li>
            <li><a href="<?php echo $this->Url->build('/resumes/download'); ?>"><i class="fa fa-circle-o"></i> Download</a></li>
        </ul>
    </li>

    
</ul>
<?php } ?>
