<section class="content-header">
  <h1>
    Resume
    <small><?= __('Upload') ?></small>
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
          <h3 class="box-title"><?= __('Form') ?></h3>
        </div>
        <?= $this->Form->create($resume, array('role' => 'form', 'enctype'=>'multipart/form-data')) ?>
          <div class="box-body">
            <div class="form-group">
              <label for="upload">Upload</label>
              <input name="upload" type="file">
              <p class="help-block">Upload your resume.</p>
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

