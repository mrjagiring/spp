<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Selamat Datang di '.CHtml::encode(Yii::app()->name),
)); ?>
<br /><br />

<div align="center">
<?php 
if (!Yii::app()->user->isGuest) {
	$this->widget('bootstrap.widgets.TbButton', array(
	    'label'=>'SPP',
	    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	    'size'=>'large', // null, 'large', 'small' or 'mini'
	    'htmlOptions'=>array('style'=>'width: 250px'),
	    'url'=>array('/spp/admin'),
	)); ?>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
	    'label'=>'Pengeluaran',
	    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	    'size'=>'large', // null, 'large', 'small' or 'mini'
	    'htmlOptions'=>array('style'=>'width: 250px'),
	    'url'=>array('/pengeluaran/admin'),
	));
}
?>
</div>

<?php $this->endWidget(); ?>
