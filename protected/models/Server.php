<?php

/**
 * This is the model class for table "server".
 *
 * The followings are the available columns in table 'server':
 * @property integer $id
 * @property string $name
 * @property string $deploy_type
 * @property string $deploy_target
 */
class Server extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Server the static model class
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
		return 'server';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, deploy_type, deploy_target', 'required'),
			array('name', 'length', 'max'=>32),
			array('deploy_type', 'length', 'max'=>9),
			array('deploy_target', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, deploy_type, deploy_target', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'deploy_type' => 'Deploy Type',
			'deploy_target' => 'Deploy Target',
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
		$criteria->compare('deploy_type',$this->deploy_type,true);
		$criteria->compare('deploy_target',$this->deploy_target,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function afterSave()
	{
		parent::afterSave();

		$basepath = Yii::app()->getBasePath();
		$filepath = realpath($basepath.'/../bin/');
		$ini = $filepath."/server/{$this->name}.ini";
		$config = <<<EOD
DEPLOY_TYPE={$this->deploy_type}
DEPLOY_TARGET={$this->deploy_target}

EOD;
		file_put_contents($ini, $config);
	}
}