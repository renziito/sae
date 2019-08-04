<?php

/**
 * This is the model class for table "kardex".
 *
 * The followings are the available columns in table 'kardex':
 * @property integer $id
 * @property integer $tipo
 * @property string $denominacion
 * @property string $monto
 * @property string $prueba
 * @property string $fecha_kardex
 * @property string $fecha
 * @property integer $estado
 */
class Kardex extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kardex';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo, denominacion, monto', 'required', 'message' => '{attribute} no debe estar vacio.'),
			array('tipo, estado', 'numerical', 'integerOnly'=>true,'message' => '{attribute} solo debe ser numeros.'),
			array('denominacion, prueba', 'length', 'max'=>255),
			array('monto', 'length', 'max'=>10),
			array('fecha_kardex, fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tipo, denominacion, monto, prueba, fecha_kardex, fecha, estado', 'safe', 'on'=>'search'),
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
			'tipo' => 'Tipo',
			'denominacion' => 'Denominacion',
			'monto' => 'Monto',
			'prueba' => 'Prueba',
			'fecha_kardex' => 'Fecha Kardex',
			'fecha' => 'Fecha',
			'estado' => 'Estado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('denominacion',$this->denominacion,true);
		$criteria->compare('monto',$this->monto,true);
		$criteria->compare('prueba',$this->prueba,true);
		$criteria->compare('fecha_kardex',$this->fecha_kardex,true);

		$criteria->order = 'fecha_kardex DESC';
		$criteria->compare('fecha',$this->fecha,true);

		$criteria->order = 'fecha DESC';
		$criteria->compare('estado',$this->estado);

		$criteria->addCondition('estado = TRUE','AND');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kardex the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
