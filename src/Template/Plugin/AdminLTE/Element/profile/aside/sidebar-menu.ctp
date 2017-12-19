<ul class="sidebar-menu">
    <li class="header">INFOS</li>
    <?php if(!empty($user->main_infos)) { ?>
        <li class="treeview">
            <a href="#" id="intro">
                <i class="fa fa-info"></i> <span> Intro</span>
                <span class="pull-right-container">
                    <i class="fa fa-eye pull-right"></i>
                </span>
            </a>
        </li>
    <?php } ?>
    <?php if(!empty($user->academic_degrees)) { ?>
        <li class="treeview">
            <a href="#" id="academicDegree">
                <i class="fa  fa-graduation-cap"></i> <span>Academic Degrees</span>
                <span class="pull-right-container">
                    <i class="fa fa-eye pull-right"></i>
                </span>
            </a>
        </li>
    <?php } ?>
    <?php if(!empty($user->advisors)) { ?>
        <li class="treeview">
            <a href="#" id="advising">
                <i class="fa  fa-magic"></i> <span>Advisings</span>
                <span class="pull-right-container">
                    <i class="fa fa-eye pull-right"></i>
                </span>
            </a>
        </li>
    <?php } ?>
    <?php if(!empty($user->awards)) { ?>
        <li class="treeview">
            <a href="#" id="award">
                <i class="fa  fa-trophy"></i> <span>Awards</span>
                <span class="pull-right-container">
                    <i class="fa fa-eye pull-right"></i>
                </span>
            </a>
        </li>
    <?php } ?>
    <?php if(!empty($user->classrooms)) { ?>
        <li class="treeview">
            <a href="#" id="classroom">
                <i class="fa fa-book"></i> <span>Classrooms</span>
                <span class="pull-right-container">
                    <i class="fa fa-eye pull-right"></i>
                </span>
            </a>
        </li>
    <?php } ?>
    <?php if(!empty($user->profitional_positions)) { ?>
        <li class="treeview">
            <a href="#" id="profitionalPosition">
                <i class="fa fa-university"></i> <span>Profitional Positions</span>
                <span class="pull-right-container">
                    <i class="fa fa-eye pull-right"></i>
                </span>
            </a>
        </li>
    <?php } ?>
    <?php if(!empty($user->publications)) { ?>
        <li class="treeview" id="publication">
            <a href="#">
                <i class="fa fa-newspaper-o"></i> <span>Publications</span>
                <span class="pull-right-container">
                    <i class="fa fa-eye pull-right"></i>
                </span>
            </a>
        </li>
    <?php } ?>
    <?php if(!empty($user->researchs)) { ?>
        <li class="treeview">
            <a href="#" id="research">
                <i class="fa fa-group"></i> <span>Researchs</span>
                <span class="pull-right-container">
                    <i class="fa fa-eye pull-right"></i>
                </span>
            </a>
        </li>
    <?php } ?>
    <?php if(!empty($user->resumes)) { ?>
        <li class="treeview">
            <a href="#" id="resume">
                <i class="fa fa-file-text"></i> <span>Resumes</span>
                <span class="pull-right-container">
                    <i class="fa fa-eye pull-right"></i>
                </span>
            </a>
        </li>
    <?php } ?>

    
</ul>
