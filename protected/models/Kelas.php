<?php

/**
 * This is the model class for table "tbl_kelas".
 *
 * The followings are the available columns in table 'tbl_kelas':
 * @property integer $id
 * @property string $nama_kelas
 * @property double $biaya_kelas
 */
class Kelas extends CActiveRecord
{
	public $temp;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kelas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_kelas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_kelas, biaya_kelas', 'required'),
			array('biaya_kelas', 'numerical'),
			array('nama_kelas', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama_kelas, biaya_kelas', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama_kelas' => 'Nama Kelas',
			'biaya_kelas' => 'Biaya Kelas',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nama_kelas',$this->nama_kelas,true);
		$criteria->compare('biaya_kelas',$this->biaya_kelas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
