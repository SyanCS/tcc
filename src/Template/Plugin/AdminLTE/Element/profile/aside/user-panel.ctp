<?php
use Cake\Core\Configure;

$file = Configure::read('Theme.folder') . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'user-panel.ctp';
$profile_pic = $this->cell('ProfilePic');
$loggedname = $this->cell('LoggedName');

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<div class="user-panel">
    <?= $profile_pic ?>
    <?= $loggedname ?>
</div>
<?php } ?>
