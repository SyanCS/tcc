<section class="content-header">
  <h1>
    Research Member
    <small><?= __('Edit') ?></small>
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
        <?= $this->Form->create($researchMember, array('role' => 'form')) ?>
          <div class="box-body">
          <?php
            echo $this->Form->input('institution');
            echo $this->Form->input('name');
            echo $this->Form->input('coordinator');
            echo $this->Form->input('research_id', ['options' => $researchs, 'empty' => true]);
            echo $this->Form->input('reg_date');
          ?>
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

