<section class="content-header">
  <h1>
    <?php echo __('Publication Participant'); ?>
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
                                            <?= h($publicationParticipant->name) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('Publication') ?></dt>
                                <dd>
                                    <?= $publicationParticipant->has('publication') ? $publicationParticipant->publication->title : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                            
                                                                                                        <dt><?= __('Reg Date') ?></dt>
                                <dd>
                                    <?= h($publicationParticipant->reg_date) ?>
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
