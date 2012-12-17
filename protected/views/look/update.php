<?php
$this->breadcrumbs=array(
	'Looks'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Look', 'url'=>array('index')),
	array('label'=>'Create Look', 'url'=>array('create')),
	array('label'=>'View Look', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Look', 'url'=>array('admin')),
);
?>

<h1>Update Look <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>