<?php

/**
 * This is the model class for table "application".
 *
 * The followings are the available columns in table 'application':
 * @property integer $id
 * @property string $name
 * @property string $leader
 * @property integer $status
 * @property string $description
 * @property string $entry
 * @property string $repo_path
 * @property string $team
 * @property string $deploy_mode
 * @property string $deploy_path
 */
class Application extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Application the static model class
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
		return 'application';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, repo_path, deploy_path', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('name, leader, deploy_mode', 'length', 'max'=>32),
			array('description', 'length', 'max'=>64),
			array('entry, repo_path, deploy_path', 'length', 'max'=>128),
			array('team', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, leader, status, description, entry, repo_path, team, deploy_mode, deploy_path', 'safe', 'on'=>'search'),
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
			'leader' => 'Leader',
			'status' => 'Status',
			'description' => 'Description',
			'entry' => 'Entry',
			'repo_path' => 'Repo Path',
			'team' => 'Team',
			'deploy_mode' => 'Deploy Mode',
			'deploy_path' => 'Deploy Path',
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
		$criteria->compare('leader',$this->leader,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('entry',$this->entry,true);
		$criteria->compare('repo_path',$this->repo_path,true);
		$criteria->compare('team',$this->team,true);
		$criteria->compare('deploy_mode',$this->deploy_mode,true);
		$criteria->compare('deploy_path',$this->deploy_path,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function afterSave()
	{
		parent::afterSave();
		cod_app2ini($this);
	}
}

function cod_app2ini($app)
{
	$basepath = Yii::app()->getBasePath();
	// echo Yii::getPathOfAlias('webroot');
	$filepath = realpath($basepath.'/../bin/');
	$ini = $filepath."/app/{$app->name}.ini";

	$app_dm = strtoupper(explode('_', $app->name, 2)[0]);
	$app_n  = strtolower(explode('_', $app->name, 2)[1]);
	$app_rt = 'svn';
	$app_ru = 'http://118.145.11.238:28763/svn'.$app->repo_path;
	$app_dp = $app->deploy_path;

	$config = <<<EOD
APP_NAME={$app_n}
APP_REPO_TYPE={$app_rt}
APP_REPO_URL={$app_ru}
APP_REPO_USER=luotao
APP_REPO_PASS=Oq1Faeu7JIQpFqKT8e

APP_DEPLOY_MODE={$app_dm}
APP_DEPLOY_PATH={$app_dp}
EOD;

	file_put_contents($ini, $config);
}
