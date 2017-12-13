<section class="content-header">
  <h1>
    <?php echo __('Research Member'); ?>
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
                                            <?= h($researchMember->institution) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Name') ?></dt>
                                        <dd>
                                            <?= h($researchMember->name) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('Research') ?></dt>
                                <dd>
                                    <?= $researchMember->has('research') ? $researchMember->research->title : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                            
                                                                                                        <dt><?= __('Reg Date') ?></dt>
                                <dd>
                                    <?= h($researchMember->reg_date) ?>
                                </dd>
                                                                                                    
                                                                        <dt><?= __('Coordinator') ?></dt>
                            <dd>
                            <?= $researchMember->coordinator ? __('Yes') : __('No'); ?>
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
