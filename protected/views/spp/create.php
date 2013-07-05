<?php
/* @var $this SppController */
/* @var $model Spp */

$this->breadcrumbs=array(
	'SPP'=>array('admin'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'List SPP', 'url'=>array('admin')),
);
?>

<h1>Tambah Data SPP</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
