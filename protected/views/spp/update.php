<?php
/* @var $this SppController */
/* @var $model Spp */

$this->breadcrumbs=array(
	'SPP'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Ubah Data',
);

$this->menu=array(
	array('label'=>'List SPP', 'url'=>array('admin')),
	array('label'=>'Tambah Data SPP', 'url'=>array('create')),
	array('label'=>'Lihat Data SPP', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Ubah Data SPP <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
