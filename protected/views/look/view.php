<?php
$this->breadcrumbs=array(
	'Looks'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Look', 'url'=>array('index')),
	array('label'=>'Create Look', 'url'=>array('create')),
	array('label'=>'Update Look', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Look', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Look', 'url'=>array('admin')),
);
?>

<h1>View Look #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'code',
		'type',
		'position',
	),
)); ?>
