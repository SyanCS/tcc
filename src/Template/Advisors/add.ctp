<section class="content-header">
  <h1>
    Advisor
    <small><?= __('Add') ?></small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-caret-square-o-left"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($advisor, array('role' => 'form')) ?>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-3">
                <?php
                echo $this->Form->input('student');
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3">
                <?php
                echo $this->Form->input('institution');
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3">
                <?php
                echo $this->Form->input('coadvisor');
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-1">
                <?php
                echo $this->Form->input('year');
                ?>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Save')) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>

