<?php
/* @var $this SouvenirController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Souvenirs',
);

$this->menu=array(
	array('label'=>'Create Souvenir', 'url'=>array('create')),
	array('label'=>'Manage Souvenir', 'url'=>array('admin')),
);
?>

<h1>Souvenirs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
