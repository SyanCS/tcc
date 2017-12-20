<?php
use Cake\Core\Configure;

$profile_pic = $this->cell('ProfilePic');
$profileTitle = $this->cell('ProfileTitle');


?>
<div class="user-panel">
    <?= $profile_pic ?>
    <?= $profileTitle ?>
</div>
