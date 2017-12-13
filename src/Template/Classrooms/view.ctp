<section class="content-header">
  <h1>
    <?php echo __('Classroom'); ?>
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
                                                                                                                <dt><?= __('Institution') ?></dt>
                                        <dd>
                                            <?= h($classroom->institution) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Year') ?></dt>
                                        <dd>
                                            <?= h($classroom->year) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Semester') ?></dt>
                                        <dd>
                                            <?= h($classroom->semester) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Theme') ?></dt>
                                        <dd>
                                            <?= h($classroom->theme) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Degree') ?></dt>
                                        <dd>
                                            <?= h($classroom->degree) ?>
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
