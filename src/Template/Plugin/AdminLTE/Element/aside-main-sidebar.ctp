<?php
use Cake\Core\Configure;

$file = Configure::read('Theme.folder') . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside-main-sidebar.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <?php echo $this->element('AdminLTE.aside/user-panel'); ?>

        <!-- search form -->
        <?php echo $this->element('AdminLTE.aside/form'); ?>
        <!-- /.search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php echo $this->element('AdminLTE.aside/sidebar-menu'); ?>

    </section>
    <!-- /.sidebar -->
</aside>
<?php } ?>
