<?php
/* @var $this PengeluaranController */
/* @var $model Pengeluaran */

$this->breadcrumbs=array(
	'Pengeluaran'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Pengeluaran', 'url'=>array('admin')),
	array('label'=>'Tambah Data Pengeluaran', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pengeluaran-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Management Pengeluaran</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered',
    'dataProvider'=>$model->search(),
    'template'=>"{items}",
    'columns'=>array(
	array(
            'name'=>'tanggal', 
            'header'=>'Tanggal'
	),
	array(
            'name'=>'kwitansi', 
            'header'=>'No. Kwitansi'
	),
	array(
            'name'=>'keterangan', 
            'header'=>'Keterangan'
	),
	array(
            'name'=>'jumlah', 
            'header'=>'Jumlah',
            'type'=>'raw',
            'value'=>function($data){ return number_format($data->jumlah, 2); },
            'headerHtmlOptions'=>array('width'=>'200px'),
            'htmlOptions'=>array('style'=>'text-align: right; padding-right: 0.5em'),
	),
        array(
            'header'=>'Action',
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'text-align: center; width: 70px'),
        ),
    ),
)); ?>
