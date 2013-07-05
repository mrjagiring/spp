<?php
/* @var $this PengeluaranController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pengeluarans',
);

$this->menu=array(
	array('label'=>'Create Pengeluaran', 'url'=>array('create')),
	array('label'=>'Manage Pengeluaran', 'url'=>array('admin')),
);
?>

<h1>Pengeluarans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
