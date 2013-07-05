<?php
/* @var $this PengeluaranController */
/* @var $model Pengeluaran */

$this->breadcrumbs=array(
	'Pengeluaran'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Ubah Data',
);

$this->menu=array(
	array('label'=>'List Pengeluaran', 'url'=>array('admin')),
	array('label'=>'Tambah Data Pengeluaran', 'url'=>array('create')),
	array('label'=>'Lihat Data Pengeluaran', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Pengeluaran <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
