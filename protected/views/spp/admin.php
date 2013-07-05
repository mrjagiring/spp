<?php
/* @var $this SppController */
/* @var $model Spp */

$this->breadcrumbs=array(
	'SPP'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SPP', 'url'=>array('admin')),
	array('label'=>'Tambah SPP', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#spp-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Management SPP</h1>

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
            'name'=>'nama_siswa', 
            'header'=>'Nama Siswa'
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
