<?php
$this->breadcrumbs=array(
	'Looks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Look', 'url'=>array('index')),
	array('label'=>'Manage Look', 'url'=>array('admin')),
);
?>

<h1>Create Look</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>