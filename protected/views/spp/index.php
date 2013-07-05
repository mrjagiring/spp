<?php
/* @var $this SppController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Spps',
);

$this->menu=array(
	array('label'=>'Create Spp', 'url'=>array('create')),
	array('label'=>'Manage Spp', 'url'=>array('admin')),
);
?>

<h1>Spps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
