<?php
/* @var $this PengeluaranController */
/* @var $model Pengeluaran */

$this->breadcrumbs=array(
	'Pengeluarans'=>array('admin'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'List Data Pengeluaran', 'url'=>array('admin')),
);
?>

<h1>Tambah Data Pengeluaran</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
