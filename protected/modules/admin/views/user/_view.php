<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">
	<div class="row">
		<span class="view_row_1"><b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b></span>
		<span class="view_row_2"><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?></span>
		<br />
	</div>

	<div class="row">
		<span class="view_row_1"><b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b></span>
		<span class="view_row_2"><?php echo CHtml::encode($data->username); ?></span>
		<br />
	</div>
<!-- 
	<b><?php //echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php //echo CHtml::encode($data->password); ?>
	<br /> -->
	<div class="row">
		<span class="view_row_1"><b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b></span>
		<span class="view_row_2"><?php echo CHtml::encode($data->email); ?></span>
		<br />
	</div>


</div>