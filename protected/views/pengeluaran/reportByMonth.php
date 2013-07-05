<?php
/* @var $this SppController */
/* @var $model Spp */

$this->breadcrumbs=array(
	'Pengeluaran'=>array('admin'),
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
		'action' => Yii::app()->createUrl('pengeluaran/reportByMonth'),
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
if(isset($_POST['Pengeluaran']['tahun']) && isset($_POST['Pengeluaran']['bulan']))
{
	$months = array(1 => 'Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	$bulanArr = $months[$_POST['Pengeluaran']['bulan']];
	if ($_POST['Pengeluaran']['bulan'] < 10) $_POST['Pengeluaran']['bulan'] = '0'.$_POST['Pengeluaran']['bulan'];
	$hasil = $_POST['Pengeluaran']['tahun'].'-'.$_POST['Pengeluaran']['bulan'];
	//echo $hasil;
?>
	<div id="yang_mau_diprint">
	<h1>Laporan Pengeluaran Bulan <?php echo $bulanArr . ' ' . $_POST['Pengeluaran']['tahun']; ?></h1>

	<?php $this->widget('bootstrap.widgets.TbGridView', array(
	    'type'=>'striped',
	    'dataProvider'=>$model->searchMonth($hasil),
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
		    'headerHtmlOptions'=>array('width'=>'260px', 'style'=>'text-align: left;'),
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
<?php
}
?>
</div>
