<?php
/* @var $this SppController */
/* @var $model Spp */

$this->breadcrumbs=array(
	'SPP'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SPP', 'url'=>array('admin')),
	array('label'=>'Tambah Data SPP', 'url'=>array('create')),
	array('label'=>'Ubah Data SPP', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Data SPP', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Anda ingin menghapus data SPP ini?')),
);
?>

<h1>Lihat Data SPP #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tanggal',
		'kwitansi',
		'nama_siswa',
		array('name'=>'kelas', 'value'=>$this->getKelas($model->kelas)),
		array('name'=>'jumlah', 'value'=>number_format($model->jumlah, 2)),
		'create_at',
		'last_update',
	),
)); ?>
