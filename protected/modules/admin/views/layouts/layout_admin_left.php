<?php
$this->widget('zii.widgets.CMenu', array(
    'items'=>array(
        // Important: you need to specify url as 'controller/action',
        // not just as 'controller' even if default acion is used.
        array('label'=>'用户管理', 
        	  'url'=>array('###'),
        	  'itemOptions'=>array('class'=>''),
              'linkOptions'=>array('class'=>'head'),
              'items'=>array(
                    array('label'=>'用户管理', 'url'=>array('/admin/user/admin'),'active'=>(Yii::app()->controller->id == "user" && Yii::app()->controller->action->id=="admin")),
                    array('label'=>'用户列表', 'url'=>array('/admin/user/'),'active'=>(Yii::app()->controller->id == "user" && (Yii::app()->controller->action->id=="index"||Yii::app()->controller->action->id=="" ))),
                    array('label'=>'添加用户', 'url'=>array('/admin/user/create'),'active'=>(Yii::app()->controller->id == "user" && Yii::app()->controller->action->id=="create")),
              ),
        ),
        
        // 'Products' menu item will be selected no matter which tag parameter value is since it's not specified.
        array('label'=>'类型管理', 
        	'url'=>array('###'), 
        	'itemOptions'=>array('class'=>''),
            'linkOptions'=>array('class'=>'head'),
        	'items'=>array(
            	array('label'=>'类型管理', 'url'=>array('/admin/type/admin'),'active'=>Yii::app()->controller->id == "type" && Yii::app()->controller->action->id=="admin"),
            	array('label'=>'类型列表', 'url'=>array('/admin/type/'),'active'=>(Yii::app()->controller->id == "type" && (Yii::app()->controller->action->id=="index" ||Yii::app()->controller->action->id==""))),
        )),
    	
    ),
    'activeCssClass'=>'active hover',
	'htmlOptions'=>array('class'=>'ui-accordion navgation'),
)); 
?>
<script>
$(function(){
	$(".head").each(function(i){
        if($(this).next().find("li").hasClass("active")){
            $(this).parent().addClass("selected");
        }
        $(this).click(function(){
            $(".head").parent().removeClass("selected");
            $(this).parent().addClass("selected"); 
            if(!$(this).next().find("li").hasClass("active")){
                $(this).parent().parent().find("a").removeClass("active hover");
                $(this).next().find("li").eq(0).addClass("active hover");    
            }
            return false;  
        });  

	});    
});
</script>