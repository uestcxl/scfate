<?php
/* @var $this AnnouncementController */
/* @var $model Announcement */

$this->breadcrumbs=array(
	'Announcements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Announcement', 'url'=>array('index')),
	array('label'=>'Manage Announcement', 'url'=>array('admin')),
);
?>

<h1>创建首页公告</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>