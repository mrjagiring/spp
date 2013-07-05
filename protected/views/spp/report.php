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
<h1>Laporan SPP</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped',
    'dataProvider'=>$model->searchNoPage(),
    'filter'=>$model,
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
            'name'=>'nama_siswa', 
            'header'=>'Nama Siswa',
            'headerHtmlOptions'=>array('width'=>'200px', 'style'=>'text-align: left;'),
	),
	array(
            'name'=>'kelas', 
            'header'=>'Kelas',
            'headerHtmlOptions'=>array('width'=>'200px', 'style'=>'text-align: left;'),
            'value'=> array($this,'getNama'),
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
	'text' => 'Print Laporan SPP',
	'element' => '#yang_mau_diprint',
	'exceptions' => array(
		'.summary',
		'.breadcrumbs',
		'.ddsmoothmenu',
		'.filters',
	),
	'publishCss' => true,
	'id' => 'print-div'
));
?>
