<div class="user-panel">
    <div style="text-align: center; margin-bottom: 15%" class="image">
        <?php
        	if(!empty($user->main_infos[0]->photo)){ 
        		echo $this->Html->image($user->main_infos[0]->photo, array('class' => 'img-circle', 'alt' => 'User Image', 'style'=>"max-width:120px;"));
        	} else{
        		echo $this->Html->image("placeholderpic.png", array('class' => 'img-circle', 'alt' => 'User Image', 'style'=>"max-width:120px;"));
        	}
        ?>
	</div>
    <div style="text-align: center;">
    	<?php if(!empty($user->main_infos[0]->name)){ ?>
			<h4 style="color:white;"><?=$user->main_infos[0]->name?></h4>
		<?php } else{ ?>
			<h4 style="color:white;"><?=$user->name?></h4>
		<?php } ?>
	</div>
</div>
