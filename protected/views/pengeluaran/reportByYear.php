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
		'id'=>'reportByYear-form',
		'action' => Yii::app()->createUrl('pengeluaran/reportByYear'),
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
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
	</div><!-- row -->
	<?php $this->endWidget(); ?>
</div><!-- form -->

<div align=center>
<?php
if(isset($_POST['Pengeluaran']['tahun']))
{?>
	<div id="yang_mau_diprint">
	<h1>Laporan Pengeluaran Tahunan <?php echo $_POST['Pengeluaran']['tahun']; ?></h1>
	<?php
	$months = array(1 => 'Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	$years = array();
	$toDetail = array();
	$totals = 0;
	for ($i=1; $i<=12; $i++) {
		if ($i < 10) $n = '0'.$i;
		$hasil = $_POST['Pengeluaran']['tahun'].'-'.$n;
		$years[$i] = $model->searchYear($hasil);
		$toDetail[$i] = array('bulan'=>$months[$i], 'jumlah'=>$years[$i]);
	}

	for ($i=1; $i<=12; $i++) {
		$this->widget('bootstrap.widgets.TbDetailView', array(
			'data'=>$toDetail[$i],
			'attributes'=>array(array('name'=>'jumlah', 'label'=>$toDetail[$i]['bulan']),),
		));
		$totals += $toDetail[$i]['jumlah'];
	}

	$this->widget('bootstrap.widgets.TbDetailView', array(
		'data'=>array('id'=>1, 'total'=>$totals, ),
		'attributes'=>array(array('name'=>'total', 'label'=>'Total'),),
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
