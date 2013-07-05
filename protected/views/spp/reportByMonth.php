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

<div align=center class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'reportByMonth-form',
		'action' => Yii::app()->createUrl('spp/reportByMonth'),
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array('enctype' => 'multipart/form-data'),
	)); ?>

	<div class="row">
	<?php 
	$yearNow = date("Y");
	$yearFrom = $yearNow - 10;
	$yearTo = $yearNow + 10;
	$arrYears = array();
	foreach (range($yearFrom, $yearTo) as $number) {
		$arrYears[$number] = $number; 
	}
	$arrYears = array_reverse($arrYears, true);
	echo $form->dropDownList($model,'tahun',$arrYears, array('options' => array($yearNow=>array('selected'=>true)))); ?>

	<?php
	$months = array(1 => 'Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	echo $form->dropDownList($model,'bulan',$months);
	?>
	
	</div><!-- row -->
	<div class="form-actions">
	    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
	    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
	</div>
	<?php $this->endWidget(); ?>
</div><!-- form -->

<div align=center>
<?php
if(isset($_POST['Spp']['tahun']) && isset($_POST['Spp']['bulan']))
{
	$months = array(1 => 'Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	$bulanArr = $months[$_POST['Spp']['bulan']];
	if ($_POST['Spp']['bulan'] < 10) $_POST['Spp']['bulan'] = '0'.$_POST['Spp']['bulan'];
	$hasil = $_POST['Spp']['tahun'].'-'.$_POST['Spp']['bulan'];
	//echo $hasil;
?>
	<div id="yang_mau_diprint">
	<h1>Laporan SPP Bulan <?php echo $bulanArr . ' ' . $_POST['Spp']['tahun']; ?></h1>

	<?php $this->widget('bootstrap.widgets.TbGridView', array(
	    'type'=>'striped',
	    'dataProvider'=>$model->searchMonth($hasil),
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
			'footer'=>"Total: ".$model->fetchTotalJumlah($model->searchMonth($hasil)->getData()),
		),
	    ),
	));
	?>

	</div>

	<?php
	$this->widget('ext.mPrint.mPrint', array(
		'title' => 'Laporan Hunian',
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
<?php
}
?>
</div>
