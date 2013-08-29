<?php

/**
 * This is the model class for table "application_server".
 *
 * The followings are the available columns in table 'application_server':
 * @property integer $id
 * @property string $name
 * @property string $update_mode
 * @property string $url
 */
class ApplicationServer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ApplicationServer the static model class
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
		return 'application_server';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, url', 'required'),
			array('name, update_mode', 'length', 'max'=>32),
			array('url', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, update_mode, url', 'safe', 'on'=>'search'),
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
			'update_mode' => 'Update Mode',
			'url' => 'Url',
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
		$criteria->compare('update_mode',$this->update_mode,true);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function afterSave()
	{
		parent::afterSave();
		cod_as2ini($this);
	}
}

function cod_as2ini($as)
{
	$basepath = Yii::app()->getBasePath();
	// echo Yii::getPathOfAlias('webroot');
	$filepath = realpath($basepath.'/../bin/');
	$ini = $filepath."/server/{$as->name}.ini";

	$config = <<<EOD
AS_UPDATE_MODE={$as->update_mode}
AS_URL={$as->url}

AS_URL_YKAPP=\${AS_URL}/php/
EOD;

	file_put_contents($ini, $config);
}
