<?php
/* @var $this SppController */
/* @var $model Spp */

$this->breadcrumbs=array(
	'SPP'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Laporan Bulanan', 'url'=>array('reportByMonth')),
	array('label'=>'Laporan Tahunan', 'url'=>array('reportByYear')),
);
?>

<div id="yang_mau_diprint">
<h1>Laporan Pengeluaran</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped',
    'dataProvider'=>$model->searchNoPage(),
    'template'=>'{summary}{items}{pager}',
    'enablePagination' => false,
    'columns'=>array(
	array(
            'name'=>'tanggal', 
            'header'=>'Tanggal',
            'headerHtmlOptions'=>array('width'=>'130px', 'style'=>'text-align: left;'),
	),
	array(
            'name'=>'kwitansi', 
            'header'=>'No. Kwitansi',
            'headerHtmlOptions'=>array('width'=>'130px', 'style'=>'text-align: left;'),
	),
	array(
            'name'=>'keterangan', 
            'header'=>'Keterangan',
            'headerHtmlOptions'=>array('width'=>'260px', 'style'=>'text-align: left;'),
	),
	array(
            'name'=>'jumlah', 
            'header'=>'Jumlah',
            'type'=>'raw',
            'value'=>function($data){ return number_format($data->jumlah, 2); },
            'headerHtmlOptions'=>array('style'=>'text-align: right; padding-right: 0.5em'),
            'htmlOptions'=>array('style'=>'text-align: right; padding-right: 0.5em'),
		'footer'=>"Total: ".$model->fetchTotalJumlah($model->searchNoPage()->getData()),
	),
    ),
));
?>

</div>

<?php
$this->widget('ext.mPrint.mPrint', array(
	'title' => 'Laporan SPP',
	'tooltip' => 'Print',
	'text' => 'Print Laporan Pengeluaran',
	'element' => '#yang_mau_diprint',
	'exceptions' => array(
		'.summary',
		'.breadcrumbs',
		'.ddsmoothmenu',
	),
	'publishCss' => true,
	'id' => 'print-div'
));
?>
