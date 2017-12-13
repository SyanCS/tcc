<section class="content-header">
  <h1>
    <?php echo __('Award'); ?>
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
                                            <?= h($award->institution) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Title') ?></dt>
                                        <dd>
                                            <?= h($award->title) ?>
                                        </dd>
                                                                                                                                                    <!--dt><?= __('User') ?></dt>
                                <dd>
                                    <?= $award->has('user') ? $award->user->name : '' ?>
                                </dd-->
                                                                                                
                                            
                                                                                                                                            
                                                                                                        <dt><?= __('Winning Date') ?></dt>
                                <dd>
                                    <?= h($award->winning_year) ?>
                                </dd>
                                                                                                    
                                            
                                                                        <dt><?= __('Descr') ?></dt>
                            <dd>
                            <?= $award->descr; ?>
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
