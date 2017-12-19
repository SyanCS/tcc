<section class="content-header">
  <h1>
    <?php echo __('Publication'); ?>
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
                                                                                                                <dt><?= __('Title') ?></dt>
                                        <dd>
                                            <?= h($publication->title) ?>
                                        </dd>
                                                                                                                                                    <dt
                                                                                                                        <dt><?= __('Publication Link') ?></dt>
                                        <dd>
                                            <?= h($publication->publication_link) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                            
                                                                                                        <dt><?= __('Date') ?></dt>
                                <dd>
                                    <?= h($publication->date->format('d/m/Y')) ?>
                                </dd>
       
                                                                                                    
                                            
                                                                        <dt><?= __('Intro') ?></dt>
                            <dd>
                            <?= $publication->intro; ?>
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

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Publication Participants']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($publication->publication_participants)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Name
                                    </th>
                                        
                                                                    
                                    <th>
                                    Publication Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Reg Date
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($publication->publication_participants as $publicationParticipants): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($publicationParticipants->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($publicationParticipants->name) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($publicationParticipants->publication_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($publicationParticipants->reg_date) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'PublicationParticipants', 'action' => 'view', $publicationParticipants->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'PublicationParticipants', 'action' => 'edit', $publicationParticipants->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PublicationParticipants', 'action' => 'delete', $publicationParticipants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $publicationParticipants->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
