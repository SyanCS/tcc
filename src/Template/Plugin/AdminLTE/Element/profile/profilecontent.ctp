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

                    <?php foreach($user->academic_degrees as $academic_degree){ ?>

                        <!-- timeline time label -->
                        <li class="time-label">
                            <span class="bg-aqua">
                                <?= $academic_degree->end_date ?>
                            </span>
                        </li>
                        <!-- /.timeline-label -->

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
                                        <dd><?= $academic_degree->start_date ?></dd>
                                        <dt>End Date:</dd>
                                        <dd><?= $academic_degree->end_date ?></dd>
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
            </div>
        </div>

        <!-- AWARDS DEGREES BOX -->
        <div class="box box-default" id="awardDiv" style="display:none">
            <div class="box-header with-border">
              <i class="fa fa-magic"></i>

              <h3 class="box-title">Awards</h3>
            </div>
            <hr>
            <!-- /.box-header -->
            <div class="box-body">
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
