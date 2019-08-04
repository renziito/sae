<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $nombres
 * @property string $apellidos
 * @property string $correo
 * @property string $rol
 * @property string $dni
 * @property string $fecha_nacimiento
 * @property string $celular
 * @property string $fecha_creacion
 * @property integer $estado
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, nombres, apellidos, correo, rol', 'required', 'message' => '{attribute} no debe estar vacio.'),
			array('estado', 'numerical', 'integerOnly'=>true,'message' => '{attribute} solo debe ser numeros.'),
			array('username, correo, rol, dni, celular', 'length', 'max'=>255),
			array('fecha_nacimiento, fecha_creacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, nombres, apellidos, correo, rol, dni, fecha_nacimiento, celular, fecha_creacion, estado', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'correo' => 'Correo',
			'rol' => 'Rol',
			'dni' => 'Dni',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'celular' => 'Celular',
			'fecha_creacion' => 'Fecha Creacion',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('rol',$this->rol,true);
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);

		$criteria->order = 'fecha_nacimiento DESC';
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);

		$criteria->order = 'fecha_creacion DESC';
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
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
