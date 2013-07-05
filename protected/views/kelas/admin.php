<?php
/* @var $this KelasController */
/* @var $model Kelas */

$this->breadcrumbs=array(
	'Kelas'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Kelas', 'url'=>array('admin')),
	array('label'=>'Tambah Kelas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kelas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Management Kelas</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
    'template'=>"{items}{pager}",
    'columns'=>array(
	array(
            'name'=>'nama_kelas', 
            'header'=>'Nama Kelas'
	),
	array(
            'name'=>'biaya_kelas', 
            'header'=>'Biaya Kelas',
            'type'=>'raw',
            'value'=>function($data){ return number_format($data->biaya_kelas, 2); },
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
