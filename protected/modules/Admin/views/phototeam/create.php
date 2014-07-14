<?php
/* @var $this PhototeamController */
/* @var $model Phototeam */

$this->breadcrumbs=array(
	'Phototeams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Phototeam', 'url'=>array('index')),
	array('label'=>'Manage Phototeam', 'url'=>array('admin')),
);
?>

<h1>添加摄影团队信息</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>