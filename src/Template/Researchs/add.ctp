<section class="content-header">
  <h1>
    Research
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
        <?= $this->Form->create($research, array('role' => 'form')) ?>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-3">
                <?php
                echo $this->Form->input('institution');
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-5">
                <?php
                echo $this->Form->input('title');
                ?>
              </div>
            </div>
            <div class="form-group">
              <?php
              echo $this->Ck->input('descr');
              ?>
            </div>
            <div class="row">
              <div class="col-xs-2">
                <?php
                echo $this->Form->input('start_date', ['empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-2">
                <?php
                echo $this->Form->input('end_date', ['empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);
                ?>
              </div>
            </div>
            <hr>
            <!-- Members -->
            <h4 class="box-title"><?= __('Members') ?></h4>
            <div class="row" id="membersListButtonDiv">
              <div class="col-xs-2">
                <button id="addMember" type="button" class="btn btn-block btn-info"><i class="fa fa-plus"></i><strong>&nbsp;&nbsp;&nbsp;Add Member</strong></button> 
            </div>
          </div>
          <br>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Save')) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>

             <?php
$this->Html->css([
    'AdminLTE./plugins/datepicker/datepicker3',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/input-mask/jquery.inputmask',
  'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
  'AdminLTE./plugins/datepicker/bootstrap-datepicker',
  'AdminLTE./plugins/datepicker/locales/bootstrap-datepicker.pt-BR',
],
['block' => 'script']);

$this->Html->css([
    'AdminLTE./plugins/datepicker/datepicker3',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/input-mask/jquery.inputmask',
  'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
  'AdminLTE./plugins/datepicker/bootstrap-datepicker',
  'AdminLTE./plugins/datepicker/locales/bootstrap-datepicker.pt-BR',
],
['block' => 'script']);
?>
<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    //Datemask mm/dd/yyyy
    $(".datepicker")
        .inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"})
        .datepicker({
            language:'pt-BR',
            format: 'dd/mm/yyyy'
        });
  });

  $(document).ready(function() {
    var memberNum = 1;
    $("#addMember").on( "click", function() {
      
      $('#membersListButtonDiv').before( "<div class='row' id='"+memberNum+"'></div>");
      $("#"+memberNum+"").append("<div id='"+memberNum+"input' class='col-xs-3'></div>")
      $("#"+memberNum+"input").append("<label>Member "+memberNum+":</label>")
      $("#"+memberNum+"input").append("<input type='text' class='form-control' name='members["+memberNum+"][name]'>");
      $('#membersListButtonDiv').before("<br>");
      memberNum++;
    });

  });
</script>
<?php $this->end(); ?>