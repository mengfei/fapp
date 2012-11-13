<?php 
$this->widget('zii.widgets.CMenu', array(
    'items'=>array(
        // Important: you need to specify url as 'controller/action',
        // not just as 'controller' even if default acion is used.
        array('label'=>'首页', 
        	  'url'=>array('#'),
        	  'active'=>true,
        	  'itemOptions'=>array('class'=>'dropdown '),
        ),
        // 'Products' menu item will be selected no matter which tag parameter value is since it's not specified.
        array('label'=>'用户管理', 
        	'url'=>array('#'), 
        	'itemOptions'=>array('class'=>'dropdown '),
        	'items'=>array(
            	array('label'=>'New Arrivals', 'url'=>array('#', 'tag'=>'new')),
            	array('label'=>'Most Popular', 'url'=>array('#', 'tag'=>'popular')),
        )),
        array('label'=>'Login', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),		
    ),
	'htmlOptions'=>array('class'=>'nav nav-list'),
));
?>
<script>
$(function(){
	$(".dropdown ul").addClass("dropdown-menu");
	$(".dropdown ul li").each(function(i){
		$(".dropdown ul li").find("a").click(function(){
			alert(11);
			if($(this).parent().parent().hasClass("dropdown-menu")){
				$(this).parent().removeClass("dropdown-menu");
			}else{
				$(this).parent().closest().removeClass("dropdown-menu");
			}
		});
	});
});

</script>