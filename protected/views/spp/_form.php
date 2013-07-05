<?php
/* @var $this SppController */
/* @var $model Spp */
/* @var $form CActiveForm */
?>

<div class="form" style="margin-left:60px;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'spp-form',
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
		<?php echo $form->labelEx($model,'nama_siswa'); ?>
		<?php echo $form->textField($model,'nama_siswa'); ?>
		<?php echo $form->error($model,'nama_siswa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kelas'); ?>
		<?php $options = array(
		'id' => 'kelas_id',
		'prompt' => '--- Silahkan Pilih Kelas ---',
		'ajax' => array(
			'type'=>'POST',
			'url'=>CController::createUrl('udpateTxt'),
			'update'=>'#jumlah_id'
		));
		echo CHtml::dropDownList('Spp[kelas]', '', CHtml::listData(Kelas::model()->findAll(), 'id', 'nama_kelas'), $options);
		?>
		<?php echo $form->error($model,'kelas'); ?>
	</div>

	<div id="jumlah_id" class="row">
		<?php echo $form->labelEx($model,'jumlah'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
