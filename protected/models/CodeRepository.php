<?php

/**
 * This is the model class for table "code_repository".
 *
 * The followings are the available columns in table 'code_repository':
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property string $rc_type
 * @property string $rc_url
 * @property string $rc_username
 * @property string $rc_password
 * @property string $rc_head
 * @property string $description
 *
 * The followings are the available model relations:
 * @property RcLog[] $rcLogs
 */
class CodeRepository extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CodeRepository the static model class
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
		return 'code_repository';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, rc_url, rc_head', 'required'),
			array('name, rc_username', 'length', 'max'=>32),
			array('type, rc_type', 'length', 'max'=>9),
			array('rc_url', 'length', 'max'=>128),
			array('rc_password, rc_head, description', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, type, rc_type, rc_url, rc_username, rc_password, rc_head, description', 'safe', 'on'=>'search'),
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
			'rcLogs' => array(self::HAS_MANY, 'RcLog', 'cr_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'type' => 'Type',
			'rc_type' => 'Rc Type',
			'rc_url' => 'Rc Url',
			'rc_username' => 'Rc Username',
			'rc_password' => 'Rc Password',
			'rc_head' => 'Rc Head',
			'description' => 'Description',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('rc_type',$this->rc_type,true);
		$criteria->compare('rc_url',$this->rc_url,true);
		$criteria->compare('rc_username',$this->rc_username,true);
		$criteria->compare('rc_password',$this->rc_password,true);
		$criteria->compare('rc_head',$this->rc_head,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}