
<?php if($type == 1) : ?>
	<a href="#">
		<i class="fa fa-user"></i> <span>Usuarios</span>
		<span class="pull-right-container">
		    <i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
	    <li><a href="<?php echo $this->Url->build('/users'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
	    <li><a href="<?php echo $this->Url->build('/users/add'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
	</ul>
<?php endif; ?>