<?php

/**
 * This is the model class for table "anuncio".
 *
 * The followings are the available columns in table 'anuncio':
 * @property integer $id
 * @property string $titulo
 * @property string $descripcion
 * @property integer $votacion
 * @property integer $comentarios
 * @property string $fin_votacion
 * @property string $fecha
 * @property integer $estado
 */
class Anuncio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'anuncio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, descripcion', 'required', 'message' => '{attribute} no debe estar vacio.'),
			array('votacion, comentarios, estado', 'numerical', 'integerOnly'=>true,'message' => '{attribute} solo debe ser numeros.'),
			array('titulo', 'length', 'max'=>255),
			array('fin_votacion, fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, descripcion, votacion, comentarios, fin_votacion, fecha, estado', 'safe', 'on'=>'search'),
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
			'titulo' => 'Titulo',
			'descripcion' => 'Descripcion',
			'votacion' => 'Votacion',
			'comentarios' => 'Comentarios',
			'fin_votacion' => 'Fin Votacion',
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
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('votacion',$this->votacion);
		$criteria->compare('comentarios',$this->comentarios);
		$criteria->compare('fin_votacion',$this->fin_votacion,true);
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
	 * @return Anuncio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
