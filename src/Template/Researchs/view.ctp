<section class="content-header">
  <h1>
    <?php echo __('Research'); ?>
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
                                            <?= h($research->institution) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Title') ?></dt>
                                        <dd>
                                            <?= h($research->title) ?>
                                        </dd>                                                                                                                                      
                                                                                                
                                            
                                                                                                                                            
                                                                                                        <dt><?= __('Start Date') ?></dt>
                                <dd>
                                    <?= h($research->start_date) ?>
                                </dd>
                                                                                                                    <dt><?= __('End Date') ?></dt>
                                <dd>
                                    <?= h($research->end_date) ?>
                                </dd>
                                                                                                                    
                                                                                                    
                                            
                                                                        <dt><?= __('Descr') ?></dt>
                            <dd>
                            <?= $research->descr; ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Research Members']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($research->research_members)): ?>

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
                                    Research Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Reg Date
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($research->research_members as $researchMembers): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($researchMembers->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($researchMembers->name) ?>
                                    </td>
                                                                                                 
                                    <td>
                                    <?= h($researchMembers->research_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($researchMembers->reg_date) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'ResearchMembers', 'action' => 'view', $researchMembers->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'ResearchMembers', 'action' => 'edit', $researchMembers->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ResearchMembers', 'action' => 'delete', $researchMembers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $researchMembers->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
