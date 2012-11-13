<?php 
$this->widget('zii.widgets.CMenu', array(
    'items'=>array(
        // Important: you need to specify url as 'controller/action',
        // not just as 'controller' even if default acion is used.
        array('label'=>'首页', 
        	  'url'=>array('#'),
        	  'active'=>true,
        	  'itemOptions'=>array('class'=>'menu'),
        ),
        // 'Products' menu item will be selected no matter which tag parameter value is since it's not specified.
        array('label'=>'用户管理', 
        	'url'=>array('#'), 
        	'itemOptions'=>array('class'=>'menu'),
        	'items'=>array(
            	array('label'=>'New Arrivals', 'url'=>array('#')),
            	array('label'=>'Most Popular', 'url'=>array('#')),
        )),
        array('label'=>'Login', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),		
    ),
	'htmlOptions'=>array('class'=>'nav nav-list'),
));
?>
<script>
$(function(){
	$(".menu > a").click(function(){
		var ulNode = $(this).next("ul");
		if(ulNode.css("display") == "none"){
			ulNode.css("display","block");
			$(".menu").removeClass("active");
			ulNode.parent().addClass("active");
		}else{
			$(".menu").removeClass("active");
			$(this).parent().addClass("active");
			ulNode.css("display","none");
		}
	});
});

</script>