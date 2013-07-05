<?php
/* @var $this KelasController */
/* @var $model Kelas */
/* @var $form CActiveForm */
?>

<div style="margin-left:60px;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kelas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Kolom dengan tanda <span class="required">*</span> harus diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_kelas'); ?>
		<?php echo $form->textField($model,'nama_kelas',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nama_kelas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'biaya_kelas'); ?>
		<?php echo $form->textField($model,'biaya_kelas'); ?>
		<?php echo $form->error($model,'biaya_kelas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
