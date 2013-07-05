<?php

/**
 * This is the model class for table "tbl_spp".
 *
 * The followings are the available columns in table 'tbl_spp':
 * @property integer $id
 * @property string $tanggal
 * @property string $kwitansi
 * @property string $nama_siswa
 * @property integer $kelas
 * @property double $jumlah
 * @property string $create_at
 * @property string $last_update
 */
class Spp extends CActiveRecord
{
	public $temp;
	public $bulan;
	public $tahun;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Spp the static model class
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
		return 'tbl_spp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal, kwitansi, nama_siswa, kelas, jumlah', 'required'),
			array('kelas', 'numerical', 'integerOnly'=>true),
			array('jumlah', 'numerical'),
			array('kwitansi', 'length', 'max'=>6),
			array('nama_siswa', 'length', 'max'=>50),
			array('create_at','default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false,'on'=>'insert'),
			array('last_update','default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false,'on'=>'update'),
			array('last_update', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tanggal, kwitansi, nama_siswa, kelas, jumlah, create_at, last_update', 'safe', 'on'=>'search'),
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
			'tanggal' => 'Tanggal',
			'kwitansi' => 'No. Kwitansi',
			'nama_siswa' => 'Nama Siswa',
			'kelas' => 'Kelas',
			'jumlah' => 'Jumlah',
			'create_at' => 'Tanggal Dibuat',
			'last_update' => 'Tanggal Diubah',
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
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('kwitansi',$this->kwitansi,true);
		$criteria->compare('nama_siswa',$this->nama_siswa,true);
		$criteria->compare('kelas',$this->kelas);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('create_at',$this->create_at,true);
		$criteria->compare('last_update',$this->last_update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchNoPage()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('kwitansi',$this->kwitansi,true);
		$criteria->compare('nama_siswa',$this->nama_siswa,true);
		$criteria->compare('kelas',$this->kelas);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('create_at',$this->create_at,true);
		$criteria->compare('last_update',$this->last_update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>$this->count())
		));
	}

	public function searchMonth($kondisi)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('kwitansi',$this->kwitansi,true);
		$criteria->compare('nama_siswa',$this->nama_siswa,true);
		$criteria->compare('kelas',$this->kelas);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('create_at',$this->create_at,true);
		$criteria->compare('last_update',$this->last_update,true);
		$criteria->condition = "tanggal LIKE '".$kondisi."-%'";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>$this->count())
		));
	}

	public function searchYear($kondisi)
	{
		$sql = "SELECT sum(`jumlah`) as `total` FROM tbl_spp WHERE `tanggal` LIKE '".$kondisi."-%'";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$results=$command->queryAll();
		if ($results[0]['total']===NULL) { return '0'; }
		else return $results[0]['total'];
	}

	public function fetchTotalJumlah($records)
	{
		$jumlah=0;
		foreach($records as $record)
			$jumlah+=$record->jumlah;
		return $jumlah;
	}
}
