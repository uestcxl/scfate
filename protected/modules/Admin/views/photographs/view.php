<?php
/* @var $this PhotographsController */
/* @var $model Photographs */

$this->breadcrumbs=array(
	'Photographs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Photographs', 'url'=>array('index')),
	array('label'=>'Create Photographs', 'url'=>array('create')),
	array('label'=>'Update Photographs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Photographs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Photographs', 'url'=>array('admin')),
);
?>

<h1>View Photographs #<?php echo $model->id; ?></h1>

<p>作品ID:<?php echo $model->id;?></p>

<p>作品标题:<?php echo $model->title;?></p>

<p>作品创建时间:<?php echo $model->create_time;?></p>

<p>作品描述:<?php echo $model->description;?></p>

<p>分类:<?php echo $model->sort->sort_name;?></p>

<p>学校:<?php echo $model->school0->area_name;?></p>

<p>摄影团队:<?php echo $model->phototeam->team_name;?></p>

<h3>图片预览</h3>
<img src="<?php echo Yii::app()->baseUrl.'/images/photographs/'.$model->picture;?>" alt="null">
