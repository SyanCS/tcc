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

                                <h3 class="timeline-header"><span><strong><?= $academic_degree->degree ?></strong> - <?= $academic_degree->title ?></h3>
                                
                                <div class="timeline-body">
                                    <dl class="dl-horizontal">
                                        <dt>Institution: </dt>
                                        <dd><?= $academic_degree->institution ?></dd>
                                        <dt>Start Date: </dt>
                                        <dd><?= $academic_degree->start_date->format('d/m/Y') ?></dd>
                                        <dt>End Date:</dd>
                                        <dd><?= $academic_degree->end_date->format('d/m/Y') ?></dd>
                                    </dl>
                                    <br><br>
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

                                <h3 class="timeline-header"><span><strong><?= $advisor->student ?></strong></h3>
                                
                                <div class="timeline-body">
                                    <dl class="dl-horizontal">
                                        <dt>Institution: </dt>
                                        <dd><?= $advisor->institution ?></dd>
                                        <dt>Co-Advisor: </dt>
                                        <dd><?= $advisor->coadvisor?></dd>
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

                                <h3 class="timeline-header"><span><strong><?= $award->title ?></strong></h3>
                                
                                <div class="timeline-body">
                                    <dl class="dl-horizontal">
                                        <dt>Institution: </dt>
                                        <dd><?= $award->institution ?></dd>
                                        <br><br>
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

                                <h3 class="timeline-header"><span><strong><?= $classroom->theme ?></strong></h3>
                                
                                <div class="timeline-body">
                                    <dl class="dl-horizontal">
                                        <dt>Institution: </dt>
                                        <dd><?= $classroom->institution ?></dd>
                                        <dt>Degree: </dt>
                                        <dd><?= $classroom->degree?></dd>
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
            </div>
        </div>

        <!-- RESUMES BOX -->
        <div class="box box-default" id="resumeDiv" style="display:none">
            <div class="box-header with-border">
              <i class="fa fa-file-text"></i>

              <h3 class="box-title">Resume</h3>
            </div>
            <hr>
            <!-- /.box-header -->
            <div class="box-body">
            </div>
        </div>

    </div>

<?php dump($user); ?>

<style>

.box-default {
    margin-top:1%;
}    

</style>
