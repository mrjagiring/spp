<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar', array(
	'type'=>'inverse', // null or 'inverse'
	'brand'=>'Program SPP',
	'brandUrl'=>'#',
	'collapse'=>true, // requires bootstrap-responsive.css
	'items'=>array(
		array(
			'class'=>'bootstrap.widgets.TbMenu',
			'items'=>array(
				array('label'=>'Home', 'icon'=>'home', 'url'=>array('/site/index'), 'active'=>true),
				array('label'=>'Profile', 'icon'=>'user', 'url'=>Yii::app()->getModule('user')->profileUrl, 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'SPP', 'icon'=>'book', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
					array('label'=>'Lihat Data SPP', 'url'=>array('/spp/admin')),
					array('label'=>'Tambah Data SPP', 'url'=>array('/spp/create')),
					array('label'=>'Laporan SPP', 'url'=>array('/spp/report')),
					)),
				array('label'=>'Pengeluaran', 'icon'=>'book', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
					array('label'=>'Lihat Data Pengeluaran', 'url'=>array('/pengeluaran/admin')),
					array('label'=>'Tambah Data Pengeluaran', 'url'=>array('/pengeluaran/create')),
					array('label'=>'Laporan Pengeluaran', 'url'=>array('/pengeluaran/report')),
					)),
				array('label'=>'Tools', 'icon'=>'cog', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
					array('label'=>'Biaya Kelas', 'url'=>array('kelas/admin')),
					)),
				array('label'=>'Tentang Program', 'icon'=>'book', 'url'=>'#', 'items'=>array(
					array('label'=>'Data SPP'),
					array('label'=>'Input SPP', 'url'=>'#'),
					array('label'=>'Lihat Data SPP', 'url'=>'#'),
					array('label'=>'Cetak Laporan SPP', 'url'=>'#'),
					'---',
					array('label'=>'Data Pengeluaran'),
					array('label'=>'Input Pengeluaran', 'url'=>'#'),
					array('label'=>'Lihat Data Pengeluaran', 'url'=>'#'),
					array('label'=>'Cetak Laporan Pengeluaran', 'url'=>'#'),
					)),
				array('label'=>'Login', 'icon'=>'cog', 'url'=>Yii::app()->getModule('user')->loginUrl, 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				),
			),
		),
	));
?>
<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<br/>
		Copyright &copy; <?php echo date('Y'); ?> DARUL ILMI MURNI<br/>
		Design and Customize by Mr. Jagiring.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
