<?php
/* @var $this KelasController */
/* @var $model Kelas */

$this->breadcrumbs=array(
	'Kelas'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kelas', 'url'=>array('admin')),
	array('label'=>'Tambah Kelas', 'url'=>array('create')),
	array('label'=>'Lihat Kelas', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Ubah Data <?php echo $model->nama_kelas; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
