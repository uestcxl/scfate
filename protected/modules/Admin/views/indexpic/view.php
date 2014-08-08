<?php
/* @var $this IndexpicController */
/* @var $model Indexpic */

$this->breadcrumbs=array(
	'Indexpics'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Indexpic', 'url'=>array('index')),
	array('label'=>'Create Indexpic', 'url'=>array('create')),
	array('label'=>'Update Indexpic', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Indexpic', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Indexpic', 'url'=>array('admin')),
);
?>

<h1>图片详情&nbsp;&nbsp;&nbsp;<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'create_time',
		'view',
	),
)); ?>

<img src="<?php echo Yii::app()->baseUrl.'/images/indexpic/'.$model->picture?>" width="350px" height="250px">