<?php
/* @var $this PengeluaranController */
/* @var $model Pengeluaran */
/* @var $form CActiveForm */
?>

<div style="margin-left:60px;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pengeluaran-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Kolom dengan tanda <span class="required">*</span> harus diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal'); ?>
		<?php echo $form->textField($model,'tanggal', array('value'=>($model->isNewRecord ? date('Y-m-d') : $model->tanggal), 'readOnly'=>'readOnly')); ?>
		<?php echo $form->error($model,'tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kwitansi'); ?>
		<?php echo $form->textField($model,'kwitansi',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'kwitansi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jumlah'); ?>
		<?php echo $form->textField($model,'jumlah'); ?>
		<?php echo $form->error($model,'jumlah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keterangan'); ?>
		<?php echo $form->textArea($model,'keterangan',array ('maxlength' => 500, 'rows' => 5, 'class'=>'span6')); ?>
		<?php echo $form->error($model,'keterangan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
