<?php

/**
 * This is the model class for table "deuda".
 *
 * The followings are the available columns in table 'deuda':
 * @property integer $id
 * @property string $denominacion
 * @property string $monto
 * @property string $fecha_vencimiento
 * @property integer $tipo
 * @property string $prueba
 * @property string $fecha
 * @property integer $estado
 */
class Deuda extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'deuda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('denominacion, monto, fecha_vencimiento', 'required', 'message' => '{attribute} no debe estar vacio.'),
			array('tipo, estado', 'numerical', 'integerOnly'=>true,'message' => '{attribute} solo debe ser numeros.'),
			array('denominacion, prueba', 'length', 'max'=>255),
			array('monto', 'length', 'max'=>10),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, denominacion, monto, fecha_vencimiento, tipo, prueba, fecha, estado', 'safe', 'on'=>'search'),
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
			'denominacion' => 'Denominacion',
			'monto' => 'Monto',
			'fecha_vencimiento' => 'Fecha Vencimiento',
			'tipo' => 'Tipo',
			'prueba' => 'Prueba',
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
		$criteria->compare('denominacion',$this->denominacion,true);
		$criteria->compare('monto',$this->monto,true);
		$criteria->compare('fecha_vencimiento',$this->fecha_vencimiento,true);

		$criteria->order = 'fecha_vencimiento DESC';
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('prueba',$this->prueba,true);
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
	 * @return Deuda the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
