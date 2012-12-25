<?php
$this->breadcrumbs=array(
	// 'Posts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Post', 'url'=>array('index')),
	array('label'=>'Create Post', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('post-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Posts</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
));*/ ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	// 'id'=>'post-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//$data 表示一个post对象?
		array(
			'name'=>'title',
			'type'=>'raw',
			'value'=>'CHtml::link(Chtml::encode($data->title),$data->url)'
			),
		array(
			'name'=>'status',
			'value'=>'Look::item("PostStatus",$data->status)',
			'filter'=>Look::items("PostStatusp"),//过滤下拉列表
			),
		array(
			'name'=>'create_time',
			'type'=>'datetime',
			'filter'=>false,//不过滤
			),
		/*'id',
		'title',
		'content',
		'tags',
		'status',
		'create_time',*/
		/*
		'update_time',
		'author_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
