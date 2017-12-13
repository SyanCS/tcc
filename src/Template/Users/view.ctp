<section class="content-header">
  <h1>
    <?php echo __('User'); ?>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-caret-square-o-left"></i> ' . __('Back'), ['action' => 'index'], ['escape' => false])?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-info"></i>
                <h3 class="box-title"><?php echo __('Information'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <dl class="dl-horizontal">
                                                                                                                <dt><?= __('Name') ?></dt>
                                        <dd>
                                            <?= h($user->name) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Username') ?></dt>
                                        <dd>
                                            <?= h($user->username) ?>
                                        </dd>
                                                                                                                                                                                                                                    <dt><?= __('Users Type') ?></dt>
                                <dd>
                                    <?= $user->has('users_type') ? $user->users_type->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                            
                                                                                                        <dt><?= __('Reg Date') ?></dt>
                                <dd>
                                    <?= h($user->reg_date) ?>
                                </dd>
                                                                                                    
                                            
                                    </dl>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- ./col -->
</div>
<!-- div -->

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Academic Degrees']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($user->academic_degrees)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    degree
                                    </th>
                                        
                                                                    
                                    <th>
                                    Institution
                                    </th>
                                        
                                                                    
                                    <th>
                                    Title
                                    </th>
                                        
                                                                    
                                    <th>
                                    Descr
                                    </th>
                                        
                                                                    
                                    <th>
                                    Start Date
                                    </th>
                                        
                                                                    
                                    <th>
                                    End Date
                                    </th>
                                        
                                                                    
                                    <th>
                                    User Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Reg Date
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($user->academic_degrees as $academicDegrees): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($academicDegrees->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($academicDegrees->degree) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($academicDegrees->institution) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($academicDegrees->title) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($academicDegrees->descr) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($academicDegrees->start_date) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($academicDegrees->end_date) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($academicDegrees->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($academicDegrees->reg_date) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'AcademicDegrees', 'action' => 'view', $academicDegrees->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'AcademicDegrees', 'action' => 'edit', $academicDegrees->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AcademicDegrees', 'action' => 'delete', $academicDegrees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $academicDegrees->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Advisors']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($user->advisors)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Student
                                    </th>
                                        
                                                                    
                                    <th>
                                    Institution
                                    </th>
                                        
                                                                    
                                    <th>
                                    Coadvisor
                                    </th>
                                        
                                                                    
                                    <th>
                                    Year
                                    </th>
                                        
                                                                    
                                    <th>
                                    User Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Reg Date
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($user->advisors as $advisors): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($advisors->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($advisors->student) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($advisors->institution) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($advisors->coadvisor) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($advisors->year) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($advisors->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($advisors->reg_date) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Advisors', 'action' => 'view', $advisors->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Advisors', 'action' => 'edit', $advisors->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Advisors', 'action' => 'delete', $advisors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $advisors->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Awards']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($user->awards)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Institution
                                    </th>
                                        
                                                                    
                                    <th>
                                    Title
                                    </th>
                                        
                                                                    
                                    <th>
                                    Descr
                                    </th>
                                        
                                                                    
                                    <th>
                                    Winning Date
                                    </th>
                                        
                                                                    
                                    <th>
                                    User Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Reg Date
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($user->awards as $awards): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($awards->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($awards->institution) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($awards->title) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($awards->descr) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($awards->winning_year) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($awards->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($awards->reg_date) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Awards', 'action' => 'view', $awards->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Awards', 'action' => 'edit', $awards->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Awards', 'action' => 'delete', $awards->id], ['confirm' => __('Are you sure you want to delete # {0}?', $awards->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Classrooms']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($user->classrooms)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Institution
                                    </th>
                                        
                                                                    
                                    <th>
                                    Year
                                    </th>
                                        
                                                                    
                                    <th>
                                    Semester
                                    </th>
                                        
                                                                    
                                    <th>
                                    Theme
                                    </th>
                                        
                                                                    
                                    <th>
                                    Degree
                                    </th>
                                        
                                                                    
                                    <th>
                                    User Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Reg Date
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($user->classrooms as $classrooms): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($classrooms->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($classrooms->institution) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($classrooms->year) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($classrooms->semester) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($classrooms->theme) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($classrooms->degree) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($classrooms->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($classrooms->reg_date) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Classrooms', 'action' => 'view', $classrooms->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Classrooms', 'action' => 'edit', $classrooms->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Classrooms', 'action' => 'delete', $classrooms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classrooms->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Main Infos']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($user->main_infos)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Photo
                                    </th>
                                        
                                                                    
                                    <th>
                                    Name
                                    </th>
                                        
                                                                    
                                    <th>
                                    Intro
                                    </th>
                                        
                                                                    
                                    <th>
                                    Tel
                                    </th>
                                        
                                                                    
                                    <th>
                                    Tel2
                                    </th>
                                        
                                                                    
                                    <th>
                                    Email
                                    </th>
                                        
                                                                    
                                    <th>
                                    User Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Reg Date
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($user->main_infos as $mainInfos): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($mainInfos->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($mainInfos->photo) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($mainInfos->name) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($mainInfos->intro) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($mainInfos->tel) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($mainInfos->tel2) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($mainInfos->email) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($mainInfos->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($mainInfos->reg_date) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'MainInfos', 'action' => 'view', $mainInfos->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'MainInfos', 'action' => 'edit', $mainInfos->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MainInfos', 'action' => 'delete', $mainInfos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mainInfos->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Profitional Positions']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($user->profitional_positions)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Position Title
                                    </th>
                                        
                                                                    
                                    <th>
                                    Institution
                                    </th>
                                        
                                                                    
                                    <th>
                                    Descr
                                    </th>
                                        
                                                                    
                                    <th>
                                    Start Date
                                    </th>
                                        
                                                                    
                                    <th>
                                    End Date
                                    </th>
                                        
                                                                    
                                    <th>
                                    User Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Reg Date
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($user->profitional_positions as $profitionalPositions): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($profitionalPositions->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($profitionalPositions->position_title) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($profitionalPositions->institution) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($profitionalPositions->descr) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($profitionalPositions->start_date) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($profitionalPositions->end_date) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($profitionalPositions->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($profitionalPositions->reg_date) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'ProfitionalPositions', 'action' => 'view', $profitionalPositions->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProfitionalPositions', 'action' => 'edit', $profitionalPositions->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProfitionalPositions', 'action' => 'delete', $profitionalPositions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profitionalPositions->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Publications']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($user->publications)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Title
                                    </th>
                                        
                                                                    
                                    <th>
                                    Intro
                                    </th>
                                        
                                                                    
                                    <th>
                                    Date
                                    </th>
                                        
                                                                    
                                    <th>
                                    User Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Reg Date
                                    </th>
                                        
                                                                    
                                    <th>
                                    Publication Link
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($user->publications as $publications): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($publications->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($publications->title) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($publications->intro) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($publications->date) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($publications->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($publications->reg_date) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($publications->publication_link) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Publications', 'action' => 'view', $publications->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Publications', 'action' => 'edit', $publications->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Publications', 'action' => 'delete', $publications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $publications->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Researchs']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($user->researchs)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Institution
                                    </th>
                                        
                                                                    
                                    <th>
                                    Title
                                    </th>
                                        
                                                                    
                                    <th>
                                    Descr
                                    </th>
                                        
                                                                    
                                    <th>
                                    Start Date
                                    </th>
                                        
                                                                    
                                    <th>
                                    End Date
                                    </th>
                                        
                                                                    
                                    <th>
                                    User Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Reg Date
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($user->researchs as $researchs): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($researchs->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($researchs->institution) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($researchs->title) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($researchs->descr) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($researchs->start_date) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($researchs->end_date) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($researchs->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($researchs->reg_date) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Researchs', 'action' => 'view', $researchs->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Researchs', 'action' => 'edit', $researchs->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Researchs', 'action' => 'delete', $researchs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $researchs->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Resumes']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($user->resumes)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Url
                                    </th>
                                        
                                                                    
                                    <th>
                                    User Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Reg Date
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($user->resumes as $resumes): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($resumes->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($resumes->url) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($resumes->user_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($resumes->reg_date) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Resumes', 'action' => 'view', $resumes->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Resumes', 'action' => 'edit', $resumes->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Resumes', 'action' => 'delete', $resumes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resumes->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
