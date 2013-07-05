<?php

class SppController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin','create','update','udpateTxt'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete', 'report', 'reportbymonth', 'reportbyyear'),
				'users'=>Yii::app()->getModule('user')->getAdmins(),//array('admin','samson'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Spp;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Spp']))
		{
			$model->attributes=$_POST['Spp'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Spp']))
		{
			$model->attributes=$_POST['Spp'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Spp');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Spp('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Spp']))
			$model->attributes=$_GET['Spp'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Spp the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Spp::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Spp $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='spp-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

//--------------------- Customize Here ---------------------\\

	public function actionUdpateTxt() {
		$idKelas = (int)$_POST['Spp']['kelas'];
		$data = Kelas::model()->FindByPk($idKelas)->biaya_kelas;
		if ($data) {
			//echo CHtml::tag('input', array('type'=>'text', 'value' => $data));
			echo '<label for="Spp_jumlah" class="required">Biaya Kelas </label>';
			echo CHtml::textField('Spp[jumlah]', $data, array('readOnly'=>'readOnly'));
		}
	}

	public function getKelas($idKelas)
	{
		$namaKelas = Kelas::model()->FindByPk($idKelas)->nama_kelas;
		return $namaKelas;
	}

	public function actionReport()
	{
		$model=new Spp('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Spp']))
			$model->attributes=$_GET['Spp'];

		$this->render('report',array(
			'model'=>$model,
		));
	}

	public function actionreportByMonth()
	{
		$model=new Spp('search');
		$model->unsetAttributes();  // clear any default values
		$this->render('reportByMonth',array(
			'model'=>$model,
		));
	}

	public function actionreportByYear()
	{
		$model=new Spp('search');
		$model->unsetAttributes();  // clear any default values
		$this->render('reportByYear',array(
			'model'=>$model,
		));
	}

	public function getNama($data)
	{
		$data = Kelas::model()->findByPk($data->kelas);
		return $data->nama_kelas;
	}
}
