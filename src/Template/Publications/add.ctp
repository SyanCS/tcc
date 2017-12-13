<section class="content-header">
  <h1>
    Publication
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
      <div class="box box-primary col-md-6">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Form') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($publication, array('role' => 'form')) ?>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-3">
                <?php
                echo $this->Form->input('title');
                ?>
              </div>
            </div>
            <div class="form-group">
              <?php
              echo $this->Ck->input('intro');
              ?>
            </div>
            <div class="row">
              <div class="col-xs-3">
                <?php
                echo $this->Form->input('publication_link');
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-2">
                <?php
                echo $this->Form->input('date', ['empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);
                ?>
              </div>
            </div>
            <hr>
            <!-- Participants -->
            <h4 class="box-title"><?= __('Participants') ?></h4>
            <div class="row" id="participantsListButtonDiv">
              <div class="col-xs-2">
                <button id="addParticipant" type="button" class="btn btn-block btn-info"><i class="fa fa-plus"></i><strong>&nbsp;&nbsp;&nbsp;Add Participant</strong></button> 
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
    var participantNum = 1;
    $("#addParticipant").on( "click", function() {
      
      $('#participantsListButtonDiv').before( "<div class='row' id='"+participantNum+"'></div>");
      $("#"+participantNum+"").append("<div id='"+participantNum+"input' class='col-xs-3'></div>")
      $("#"+participantNum+"input").append("<label>Participant "+participantNum+":</label>")
      $("#"+participantNum+"input").append("<input type='text' class='form-control' name='participants["+participantNum+"][name]'>");
      $('#participantsListButtonDiv').before("<br>");
      participantNum++;
    });

  });
</script>
<?php $this->end(); ?>