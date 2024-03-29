<?php

/**
 * This is the model class for table "usuario_departamento".
 *
 * The followings are the available columns in table 'usuario_departamento':
 * @property integer $id
 * @property integer $departamento_id
 * @property integer $usuario_id
 * @property integer $tipo
 * @property string $desde
 * @property string $hasta
 * @property integer $personas
 * @property integer $mascotas
 * @property integer $estado
 */
class UsuarioDepartamento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario_departamento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('departamento_id, usuario_id, tipo, personas, mascotas', 'required', 'message' => '{attribute} no debe estar vacio.'),
			array('departamento_id, usuario_id, tipo, personas, mascotas, estado', 'numerical', 'integerOnly'=>true,'message' => '{attribute} solo debe ser numeros.'),
			array('desde, hasta', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, departamento_id, usuario_id, tipo, desde, hasta, personas, mascotas, estado', 'safe', 'on'=>'search'),
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
			'departamento_id' => 'Departamento',
			'usuario_id' => 'Usuario',
			'tipo' => 'Tipo',
			'desde' => 'Desde',
			'hasta' => 'Hasta',
			'personas' => 'Personas',
			'mascotas' => 'Mascotas',
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
		$criteria->compare('departamento_id',$this->departamento_id);
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('desde',$this->desde,true);
		$criteria->compare('hasta',$this->hasta,true);
		$criteria->compare('personas',$this->personas);
		$criteria->compare('mascotas',$this->mascotas);
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
	 * @return UsuarioDepartamento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
