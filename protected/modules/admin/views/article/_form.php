<?php
/* @var $this ArticleController */
/* @var $model Article */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'t_id'); ?>
		<?php //echo $form->textField($model,'t_id'); ?>
		<?php echo $form->dropDownList($model,'t_id',CHtml::listData(Type::model()->findAll(),'id','type'))?>	
		<?php echo $form->error($model,'t_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('rows'=>6, 'cols'=>50)); ?>	
		<?php echo $form->error($model,'title'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php //echo $form->textArea($model,'content'); ?>
		<?php
			$this->widget('ext.fckeditor.FCKEditorWidget',array(
			'model'     =>  $model,
			'attribute' => 'content',//属性的名字
			'height'    =>  '300px',//高度
			'width'     =>  '90%',//宽度
			'fckeditor' =>  Yii::app()->basePath.'/../fckeditor/fckeditor.php',
			'fckBasePath' => Yii::app()->baseUrl.'/fckeditor/',
			'config' => array('ToolbarStartExpanded'=>true),//配置，这里设置的是默认不展开工具条
			//'editorTemplate' => 'full'
			)
			); 
		?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'addtime'); ?>
		<?php echo $form->textField($model,'addtime'); ?>
		<?php echo $form->error($model,'addtime'); ?>
	</div> -->

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div> -->

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'modifytime'); ?>
		<?php echo $form->textField($model,'modifytime'); ?>
		<?php echo $form->error($model,'modifytime'); ?>
	</div> -->

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'view_num'); ?>
		<?php echo $form->textField($model,'view_num'); ?>
		<?php echo $form->error($model,'view_num'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'source'); ?>
		<?php echo $form->textArea($model,'source',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'source'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tag'); ?>
		<?php echo $form->textArea($model,'tag',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tag'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->