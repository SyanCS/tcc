<div class="col-md-12">

        <!-- INTRO BOX -->
        <div class="box box-default" id="introDiv">
            <div class="box-header with-border">
              <i class="fa fa-info"></i>

              <h3 class="box-title">Intro</h3>
            </div>
            <hr>
            <!-- /.box-header -->
            <div class="box-body">
                <?= $user->main_infos[0]->intro; ?>
                <br><br>
                <p><h3>Contact: </h3></p>
                <dl >

                <?php if(!empty($user->main_infos[0]->email)){ ?>
                    <dt>Email: </dt>
                    <dd><?= $user->main_infos[0]->email ?></dd>
                    <br>
                <?php } ?>
                <?php if(!empty($user->main_infos[0]->tel)){ ?>
                    <dt>Telephone: </dt>
                    <dd><?= $user->main_infos[0]->tel ?></dd>
                    <br>
                <?php } ?>
                <?php if(!empty($user->main_infos[0]->tel2)){ ?>
                    <dt>Telephone 2: </dt>
                    <dd><?= $user->main_infos[0]->tel2 ?></dd>
                    <br>
                <?php } ?>
            </dl>
            </div>
        </div>

        <!-- ACADEMIC DEGREES BOX -->
        <div class="box box-default" id="academicDegreeDiv" style="display:none">
            <div class="box-header with-border">
              <i class="fa fa-graduation-cap"></i>

              <h3 class="box-title">Academic Degrees</h3>
            </div>
            <hr>
            <!-- /.box-header -->
            <div class="box-body">

                <ul class="timeline">

                    <?php
                    $last_year = "" ;
                    foreach($user->academic_degrees as $academic_degree){

                        $this_year = $academic_degree->end_date->format('Y');

                        if($this_year != $last_year){ ?>

                            <!-- timeline time label -->
                            <li class="time-label">
                                <span class="bg-aqua">
                                    &nbsp &nbsp <?= $this_year ?> &nbsp &nbsp
                                </span>
                            </li>
                            <!-- /.timeline-label -->
                        <?php }

                        $last_year = $this_year;

                        ?>

                        <!-- timeline item -->
                        <li>
                            <!-- timeline icon -->
                            <i class="fa fa-graduation-cap"></i>
                            <div class="timeline-item">

                                <h3 class="timeline-header"><span><strong><?= $academic_degree->degree ?></strong> - <?= $academic_degree->title ?></span></h3>
                                
                                <div class="timeline-body panel box">
                                    <dl >
                                        <dt>Institution: </dt>
                                        <dd><?= $academic_degree->institution ?></dd>
                                        <br>
                                        <dt>Start Date: </dt>
                                        <dd><?= $academic_degree->start_date->format('d/m/Y') ?></dd>
                                        <br>
                                        <dt>End Date:</dd>
                                        <br>
                                        <dd><?= $academic_degree->end_date->format('d/m/Y') ?></dd>
                                        <br>
                                    </dl>
                                    
                                    <?= $academic_degree->descr ?>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <!-- END timeline item -->
                    <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                    </li>

                </ul>

            </div>
        </div>

        <!-- ADVISINGS BOX -->
        <div class="box box-default" id="advisingDiv" style="display:none">
            <div class="box-header with-border">
              <i class="fa fa-magic"></i>

              <h3 class="box-title">Advisings</h3>
            </div>
            <hr>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="timeline">

                    <?php
                    $last_year = "" ;
                    foreach($user->advisors as $advisor){

                        $this_year = $advisor->year;

                        if($this_year != $last_year){ ?>

                            <!-- timeline time label -->
                            <li class="time-label">
                                <span class="bg-aqua">
                                    &nbsp &nbsp <?= $this_year ?> &nbsp &nbsp
                                </span>
                            </li>
                            <!-- /.timeline-label -->
                        <?php }

                        $last_year = $this_year;

                        ?>

                        <!-- timeline item -->
                        <li>
                            <!-- timeline icon -->
                            <i class="fa fa-magic"></i>
                            <div class="timeline-item">

                                <h3 class="timeline-header"><span><strong><?= $advisor->student ?></strong></span></h3>
                                
                                <div class="timeline-body panel box">
                                    <dl >
                                        <dt>Institution: </dt>
                                        <dd><?= $advisor->institution ?></dd>
                                        <br>
                                        <?php if(!empty($advisor->coadvisor)){ ?>
                                            <dt>Co-Advisor: </dt>
                                            <dd><?= $advisor->coadvisor?></dd>
                                        <br>
                                        <?php } ?>
                                    </dl>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <!-- END timeline item -->
                    <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                </ul>

            </div>
        </div>

        <!-- AWARDS DEGREES BOX -->
        <div class="box box-default" id="awardDiv" style="display:none">
            <div class="box-header with-border">
              <i class="fa fa-trophy"></i>

              <h3 class="box-title">Awards</h3>
            </div>
            <hr>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="timeline">

                    <?php
                    $last_year = "" ;
                    foreach($user->awards as $award){

                        $this_year = $award->winning_year;

                        if($this_year != $last_year){ ?>

                            <!-- timeline time label -->
                            <li class="time-label">
                                <span class="bg-aqua">
                                    &nbsp &nbsp <?= $this_year ?> &nbsp &nbsp
                                </span>
                            </li>
                            <!-- /.timeline-label -->
                        <?php }

                        $last_year = $this_year;

                        ?>

                        <!-- timeline item -->
                        <li>
                            <!-- timeline icon -->
                            <i class="fa fa-trophy"></i>
                            <div class="timeline-item">

                                <h3 class="timeline-header"><span><strong><?= $award->title ?></strong></span></h3>
                                
                                <div class="timeline-body panel box">
                                    <dl >
                                        <dt>Institution: </dt>
                                        <dd><?= $award->institution ?></dd>
                                        <br>
                                        
                                        <?= $award->descr?>
                                    </dl>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <!-- END timeline item -->
                    <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                </ul>
            </div>
        </div>

        <!-- CLASROOMS BOX -->
        <div class="box box-default" id="classroomDiv" style="display:none">
            <div class="box-header with-border">
              <i class="fa fa-book"></i>

              <h3 class="box-title">Classrooms</h3>
            </div>
            <hr>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="timeline">

                    <?php
                    $last_year = "" ;
                    $last_semester = "";
                    foreach($user->classrooms as $classroom){

                        $this_year = $classroom->year;
                        $this_semester = $classroom->semester;

                        if($this_year.".".$this_semester != $last_year.".".$last_semester = ""){ ?>

                            <!-- timeline time label -->
                            <li class="time-label">
                                <span class="bg-aqua">
                                    &nbsp &nbsp <?= $this_year.".".$this_semester ?> &nbsp &nbsp
                                </span>
                            </li>
                            <!-- /.timeline-label -->
                        <?php }

                        $last_year = $this_year;
                        $last_semester = $this_semester;

                        ?>

                        <!-- timeline item -->
                        <li>
                            <!-- timeline icon -->
                            <i class="fa fa-book"></i>
                            <div class="timeline-item">

                                <h3 class="timeline-header"><span><strong><?= $classroom->theme ?></strong></span></h3>
                                
                                <div class="timeline-body panel box">
                                    <dl >
                                        <dt>Institution: </dt>
                                        <dd><?= $classroom->institution ?></dd>
                                        <br>
                                        <dt>Degree: </dt>
                                        <dd><?= $classroom->degree?></dd>
                                        <br>
                                    </dl>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <!-- END timeline item -->
                    <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                    </li>

                </ul>
            </div>
        </div>

        <!-- PROFITIONAL POSITIONS BOX -->
        <div class="box box-default" id="profitionalPositionDiv" style="display:none">
            <div class="box-header with-border">
              <i class="fa fa-university"></i>

              <h3 class="box-title">Profitional Positions</h3>
            </div>
            <hr>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="timeline">

                    <?php
                    $last_year = "" ;
                    foreach($user->profitional_positions as $profitional_position){

                        $this_year = $profitional_position->end_date->format('Y');

                        if($this_year != $last_year){ ?>

                            <!-- timeline time label -->
                            <li class="time-label">
                                <span class="bg-aqua">
                                    &nbsp &nbsp <?= $this_year ?> &nbsp &nbsp
                                </span>
                            </li>
                            <!-- /.timeline-label -->
                        <?php }

                        $last_year = $this_year;

                        ?>

                        <!-- timeline item -->
                        <li>
                            <!-- timeline icon -->
                            <i class="fa fa-university"></i>
                            <div class="timeline-item">

                                <h3 class="timeline-header"><span><strong><?= $profitional_position->position_title ?></strong></span></h3>
                                
                                <div class="timeline-body panel box">
                                    <dl >
                                        <dt>Institution: </dt>
                                        <dd><?= $profitional_position->institution ?></dd>
                                        <br>
                                        <dt>Start Date: </dt>
                                        <dd><?= $profitional_position->start_date->format('d/m/Y') ?></dd>
                                        <br>
                                        <dt>End Date:</dd>
                                        <br>
                                        <dd><?= $profitional_position->end_date->format('d/m/Y') ?></dd>
                                        <br>
                                    </dl>
                                    
                                    <?= $profitional_position->descr ?>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <!-- END timeline item -->
                    <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                    </li>

                </ul>
            </div>
        </div>

        <!-- PUBLICATIONS BOX -->
        <div class="box box-default" id="publicationDiv" style="display:none">
            <div class="box-header with-border">
              <i class="fa fa-newspaper-o"></i>

              <h3 class="box-title">Publications</h3>
            </div>
            <hr>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="timeline">

                    <?php
                    $last_year = "" ;
                    foreach($user->publications as $publication){

                        $this_year = $publication->date->format('Y');

                        if($this_year != $last_year){ ?>

                            <!-- timeline time label -->
                            <li class="time-label">
                                <span class="bg-aqua">
                                    &nbsp &nbsp <?= $this_year ?> &nbsp &nbsp
                                </span>
                            </li>
                            <!-- /.timeline-label -->
                        <?php }

                        $last_year = $this_year;

                        ?>

                        <!-- timeline item -->
                        <li>
                            <!-- timeline icon -->
                            <i class="fa fa-newspaper-o"></i>
                            <div class="timeline-item">

                                <h3 class="timeline-header"><span><strong><?= $publication->title ?></strong></span></h3>
                                
                                <div class="timeline-body panel box">
                                    <dl >
                                        <dt>Link: </dt>
                                        <dd><!--a href="<?= $publication->publication_link ?>"--><?= $publication->publication_link ?></a></dd>
                                        <br>
                                        <dt>Date: </dt>
                                        <dd><?= $publication->date->format('d/m/Y') ?></dd>
                                        <br>
                                        <?php if(!empty($publication->publication_participants)){
                                            $participants = "";
                                            foreach($publication->publication_participants as $participant){
                                                    $participants .= $participant->name.", ";
                                            } ?>
                                            <dt>Participants: </dt>
                                                <dd>
                                                <?= substr($participants,0,-2);?>
                                                </dd>
                                        <br>
                                        <?php } ?>
                                    </dl>
                                    
                                    <?= $publication->intro ?>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <!-- END timeline item -->
                    <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                    </li>

                </ul>
            </div>
        </div>

        <!-- RESEARCHS BOX -->
        <div class="box box-default" id="researchDiv" style="display:none">
            <div class="box-header with-border">
              <i class="fa fa-group"></i>

              <h3 class="box-title">Researchs</h3>
            </div>
            <hr>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="timeline">

                    <?php
                    $last_year = "" ;
                    foreach($user->researchs as $research){

                        $this_year = $research->end_date->format('Y');

                        if($this_year != $last_year){ ?>

                            <!-- timeline time label -->
                            <li class="time-label">
                                <span class="bg-aqua">
                                    &nbsp &nbsp <?= $this_year ?> &nbsp &nbsp
                                </span>
                            </li>
                            <!-- /.timeline-label -->
                        <?php }

                        $last_year = $this_year;

                        ?>

                        <!-- timeline item -->
                        <li>
                            <!-- timeline icon -->
                            <i class="fa fa-newspaper-o"></i>
                            <div class="timeline-item">

                                <h3 class="timeline-header"><span><strong><?= $research->title ?></strong></span></h3>
                                
                                <div class="timeline-body panel box">
                                    <dl >
                                        <dt>Institution: </dt>
                                        <dd><?= $research->institution ?></a></dd>
                                        <br>
                                        <dt>Start Date: </dt>
                                        <dd><?= $research->start_date->format('d/m/Y') ?></dd>
                                        <br>
                                        <dt>End Date: </dt>
                                        <dd><?= $research->end_date->format('d/m/Y') ?></dd>
                                        <br>
                                        <?php if(!empty($research->research_members)){
                                            $members = "";
                                            foreach($research->research_members as $member){
                                                    $members .= $member->name.", ";
                                            } ?>
                                            <dt>Members: </dt>
                                                <dd>
                                                <?= substr($members,0,-2);?>
                                                </dd>
                                        <br>
                                        <?php } ?>
                                    </dl>
                                    
                                    <?= $research->descr ?>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <!-- END timeline item -->
                    <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                    </li>

                </ul>
            </div>
        </div>
    </div>

<?php //dump($user); ?>

<style>

.box-default {
    margin-top:7%;
}    

</style>
