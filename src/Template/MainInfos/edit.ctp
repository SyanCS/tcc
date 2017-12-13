<section class="content-header">
  <h1>
    Main Info
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
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($mainInfo, array('role' => 'form','enctype'=>'multipart/form-data')) ?>
          <div class="box-body">
          
            <div class="form-group">
              <label for="photo">Photo</label>
              <input name="photo" type="file" id="exampleInputFile" accept="image/*">
              <p class="help-block">Upload a photo to your profile.</p>
            </div>

            <div class="row">
              <div class="col-xs-4">
                <?php
                echo $this->Form->input('name', ['label' => 'Title', 'placeholder' =>'Dr. Jhon Dude' ]);
                ?>
              </div>
            </div>

            <div class="form-group">
              <?php
                echo $this->Ck->input('intro', ['type' => 'textarea', 'placeholder' => 'Introduction to yourself...']);
              ?>
            </div>

            <div class="row">
              <div class="col-xs-3">
                <?php
                echo $this->Form->input('tel');
                ?>
              </div>
              <div class="col-xs-3">
                <?php
                echo $this->Form->input('tel2');
                ?>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-4">
                <?php
                echo $this->Form->input('email');
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

