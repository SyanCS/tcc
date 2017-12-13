
<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Login') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create() ?>
          <div class="box-body">
          <fieldset>
            <?php
              echo $this->Form->input('username');
              echo $this->Form->input('password');
            ?>
          </fieldset>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Login')) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>