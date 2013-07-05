<?php
/* @var $this KelasController */
/* @var $model Kelas */

$this->breadcrumbs=array(
	'Kelas'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Kelas', 'url'=>array('admin')),
	array('label'=>'Tambah Kelas', 'url'=>array('create')),
	array('label'=>'Ubah Kelas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Kelas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Anda ingin menghapus kelas ini?')),
);
?>

<h1>Lihat Data <?php echo $model->nama_kelas; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        array('name'=>'id', 'label'=>'ID Kelas'),
        array('name'=>'nama_kelas', 'label'=>'Nama Kelas'),
        array('name'=>'biaya_kelas', 'label'=>'Biaya Kelas', 'value'=>number_format($model->biaya_kelas, 2)),
    ),
)); ?>
