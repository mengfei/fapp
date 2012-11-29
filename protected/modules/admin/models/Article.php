<?php

/**
 * This is the model class for table "tbl_article".
 *
 * The followings are the available columns in table 'tbl_article':
 * @property integer $id
 * @property integer $t_id
 * @property string $title
 * @property string $content
 * @property integer $addtime
 * @property integer $user_id
 * @property integer $modifytime
 * @property integer $view_num
 * @property string $source
 * @property string $tag
 */
class Article extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Article the static model class
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
		return 'tbl_article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('t_id, title, content, addtime, user_id, view_num', 'required'),
			array('t_id, addtime, user_id, modifytime, view_num', 'numerical', 'integerOnly'=>true),
			array('source, tag', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, t_id, title, content, addtime, user_id, modifytime, view_num, source, tag', 'safe', 'on'=>'search'),
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
			't_id'=>array(self::HAS_ONE,'Type','id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			't_id' => 'T',
			'title' => 'Title',
			'content' => 'Content',
			//'addtime' => 'Addtime',
			'user_id' => 'User',
			'modifytime' => 'Modifytime',
			'view_num' => 'View Num',
			'source' => 'Source',
			'tag' => 'Tag',
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
		$criteria->compare('t_id',$this->t_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('addtime',$this->addtime);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('modifytime',$this->modifytime);
		$criteria->compare('view_num',$this->view_num);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('tag',$this->tag,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * [beforeSave description] 添加新记录时 默认填充字段
	 * @return [type] [description]
	 */
	protected function beforeSave()
	{
		if(parent::beforeSave()){
			if($this->isNewRecords){
				$this->addtime = time();
				$this->user_id = Yii::app()->user->getId();
			}else{
				$this->modifytime = time();
			}
			return true;
		}
		return false;
	}
}