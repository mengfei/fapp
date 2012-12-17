<?php
$this->breadcrumbs=array(
	'Looks',
);

$this->menu=array(
	array('label'=>'Create Look', 'url'=>array('create')),
	array('label'=>'Manage Look', 'url'=>array('admin')),
);
?>

<h1>Looks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
