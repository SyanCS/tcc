<section class="content-header">
  <h1>
    <?php echo __('Main Info'); ?>
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
                                                                                                                <dt><?= __('Photo') ?></dt>
                                        <dd>
                                            <?= h($mainInfo->photo) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Name') ?></dt>
                                        <dd>
                                            <?= h($mainInfo->name) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Tel') ?></dt>
                                        <dd>
                                            <?= h($mainInfo->tel) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Tel2') ?></dt>
                                        <dd>
                                            <?= h($mainInfo->tel2) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Email') ?></dt>
                                        <dd>
                                            <?= h($mainInfo->email) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('User') ?></dt>
                                <dd>
                                    <?= $mainInfo->has('user') ? $mainInfo->user->name : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                            
                                                                                                        <dt><?= __('Reg Date') ?></dt>
                                <dd>
                                    <?= h($mainInfo->reg_date) ?>
                                </dd>
                                                                                                    
                                            
                                                                        <dt><?= __('Intro') ?></dt>
                            <dd>
                            <?= $this->Text->autoParagraph(h($mainInfo->intro)); ?>
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
