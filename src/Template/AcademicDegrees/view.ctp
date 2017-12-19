<section class="content-header">
  <h1>
    <?php echo __('Academic Degree'); ?>
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
                                                                                                                <dt><?= __('Degree:') ?></dt>
                                        <dd>
                                            <?= h($academicDegree->degree) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Institution:') ?></dt>
                                        <dd>
                                            <?= h($academicDegree->institution) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Title:') ?></dt>
                                        <dd>
                                            <?= h($academicDegree->title) ?>
                                        </dd>
                                                                                                
                                            
                                                                                                                                            
                                                                                                        <dt><?= __('Start Date:') ?></dt>
                                <dd>
                                    <?= h($academicDegree->start_date->format('d/m/Y')) ?>
                                </dd>
                                                                                                                    <dt><?= __('End Date:') ?></dt>
                                <dd>
                                    <?= h($academicDegree->end_date->format('d/m/Y')) ?>
                                </dd>
                                                                                                    
                                            
                                                                        <dt><?= __('Descr:') ?></dt>
                            <dd>
                            <?= $academicDegree->descr; ?>
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

</section>
