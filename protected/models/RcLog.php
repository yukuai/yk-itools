<?php

/**
 * This is the model class for table "rc_log".
 *
 * The followings are the available columns in table 'rc_log':
 * @property integer $id
 * @property integer $cr_id
 * @property integer $rev
 * @property string $author
 * @property string $msg
 * @property integer $timestamp
 *
 * The followings are the available model relations:
 * @property CodeRepository $cr
 */
class RcLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RcLog the static model class
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
		return 'rc_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cr_id, rev, author, timestamp', 'required'),
			array('cr_id, rev, timestamp', 'numerical', 'integerOnly'=>true),
			array('author', 'length', 'max'=>24),
			array('msg', 'length', 'max'=>1024),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cr_id, rev, author, msg, timestamp', 'safe', 'on'=>'search'),
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
			'cr' => array(self::BELONGS_TO, 'CodeRepository', 'cr_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cr_id' => 'Cr',
			'rev' => 'Rev',
			'author' => 'Author',
			'msg' => 'Msg',
			'timestamp' => 'Timestamp',
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
		$criteria->compare('cr_id',$this->cr_id);
		$criteria->compare('rev',$this->rev);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('msg',$this->msg,true);
		$criteria->compare('timestamp',$this->timestamp);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}