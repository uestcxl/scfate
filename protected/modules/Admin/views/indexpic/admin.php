<?php
/* @var $this IndexpicController */
/* @var $model Indexpic */

$this->breadcrumbs=array(
	'Indexpics'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Indexpic', 'url'=>array('index')),
	array('label'=>'Create Indexpic', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#indexpic-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理首页大图</h1>


<?php echo CHtml::link('详细搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'indexpic-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'picture',
		'create_time',
		'view',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
