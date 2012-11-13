<?php
/* @var $this TypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'类别',
);

$this->menu=array(
	array('label'=>'添加类别', 'url'=>array('create')),
	array('label'=>'管理类别', 'url'=>array('admin')),
);
?>

<h1>Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
