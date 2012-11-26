<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

// $this->menu=array(
// 	array('label'=>'List User', 'url'=>array('index')),
// 	array('label'=>'Create User', 'url'=>array('create')),
// );

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理用户</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'id', 'header'=>'#'),
        array('name'=>'username', 'header'=>'username'),
        array('name'=>'email', 'header'=>'email'),
        array(
        	//'name'=>'manager',
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>
