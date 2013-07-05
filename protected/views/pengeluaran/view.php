<?php
/* @var $this PengeluaranController */
/* @var $model Pengeluaran */

$this->breadcrumbs=array(
	'Pengeluaran'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pengeluaran', 'url'=>array('admin')),
	array('label'=>'Tambah Data Pengeluaran', 'url'=>array('create')),
	array('label'=>'Ubah Data Pengeluaran', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Data Pengeluaran', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Anda ingin menghapus data Pengeluaran ini?')),
);
?>

<h1>View Pengeluaran #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
		array('name'=>'id', 'label'=>'ID Pengeluaran'),
		'tanggal',
		'kwitansi',
		array('name'=>'jumlah', 'value'=>number_format($model->jumlah, 2)),
		'keterangan',
		'create_at',
		'last_update',
    ),
)); ?>
