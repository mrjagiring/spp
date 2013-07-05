<?php
/* @var $this KelasController */
/* @var $data Kelas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_kelas')); ?>:</b>
	<?php echo CHtml::encode($data->nama_kelas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('biaya_kelas')); ?>:</b>
	<?php echo CHtml::encode($data->biaya_kelas); ?>
	<br />


</div>
