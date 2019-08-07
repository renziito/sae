<?php

/**
 * This is the model class for table "usuario_deuda".
 *
 * The followings are the available columns in table 'usuario_deuda':
 * @property integer $id
 * @property integer $deuda_id
 * @property integer $usuario_id
 * @property integer $pagado
 * @property string $fecha_pago
 * @property string $fecha
 * @property integer $estado
 */
class UsuarioDeuda extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario_deuda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('deuda_id, usuario_id', 'required', 'message' => '{attribute} no debe estar vacio.'),
			array('deuda_id, usuario_id, pagado, estado', 'numerical', 'integerOnly'=>true,'message' => '{attribute} solo debe ser numeros.'),
			array('fecha_pago, fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, deuda_id, usuario_id, pagado, fecha_pago, fecha, estado', 'safe', 'on'=>'search'),
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
			'deuda_id' => 'Deuda',
			'usuario_id' => 'Usuario',
			'pagado' => 'Pagado',
			'fecha_pago' => 'Fecha Pago',
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
		$criteria->compare('deuda_id',$this->deuda_id);
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('pagado',$this->pagado);
		$criteria->compare('fecha_pago',$this->fecha_pago,true);

		$criteria->order = 'fecha_pago DESC';
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
	 * @return UsuarioDeuda the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
