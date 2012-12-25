<?php

/**
 * This is the model class for table "tbl_post".
 *
 * The followings are the available columns in table 'tbl_post':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $tags
 * @property integer $status
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $author_id
 *
 * The followings are the available model relations:
 * @property User $author
 * @property Comment[] $comments
 */
class Post extends CActiveRecord
{
	private $_oldTags;

	const STATUS_DRAFT = 1;
	const STATUS_PUBLISHED = 2;
	const STATUS_ARCHIVED = 3;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Post the static model class
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
		return 'tbl_post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content, status', 'required'),
			array('title', 'length', 'max'=>128),
			array('status','in','range'=>array(1,2,3)),
			array('tags', 'match','pattern'=>'/^[\w\s,]+$/',
				'message'=>'Tgas can only contain word characters.'),
			array('tags','normalizeTags'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('title,status','safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 * 关联规则
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		// 根据关联关系 查询POST信息时,会惰性查询关联表的信息
		return array(
			'author' => array(self::BELONGS_TO, 'User', 'author_id'),
			'comments' => array(self::HAS_MANY, 'Comment', 'post_id',
						'condition'=>'comments.status='.Comment::STATUS_APPROVED,
						'order'=>'comments.create_time desc'
				),
			'commentCount' => array(self::STAT,'Comment', 'post_id','condition'=>'status='.Comment::STATUS_APPROVED)
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'content' => 'Content',
			'tags' => 'Tags',
			'status' => 'Status',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'author_id' => 'Author',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);
		$criteria->compare('author_id',$this->author_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * [normalizeTags description]  
	 * validate方法
	 * @param  [type] $attrbute [description]
	 * @param  [type] $params   [description]
	 * @return [type]           [description]
	 */
	public function normalizeTags($attrbute,$params)
	{
		$this->tags = Tag::array2string(array_unique(Tag::string2array($this->tags)));
	}

	/**
	 * [getUrl description]
	 * 添加日志的标题作为URL中的一个GET参数
	 * 主要为了引擎优化(SEO)
	 * @return [type] [description]
	 */
	public function getUrl()
	{
		return Yii::app()->createUrl('post/view',array(
				'id'=>$this->id,
				'title'=>$this->title
			));
	}

	protected function beforeSave()
	{
		if(parent::beforeSave()){
			if($this->isNewRecord){
				$this->create_time = $this->update_time = time();
				$this->author_id = Yii::app()->user->id;
			}else{
				$this->update_time = time();
			}
			return true;
		}else
			return false;
	}

	protected function afterSave()
	{
		parent::afterSave();
		Tag::model()->updateFrequency($this->_oldTags,$this->tags);
	}

	/**
	 * [afterFind description]
	 * afterFind()会在一个 AR数据库中的数据填充时被Yii调用  select时
	 * @return [type] [description]
	 */
	protected function afterFind()
	{
		parent::afterFind();
		var_dump($this->tags);
		$this->_oldTags = $this->tags;
	}

	/**
	 * [afterDelete description]
	 * 删除日志的同时删除评论和标签
	 * @return [type] [description]
	 */
	protected function afterDelete()
	{
		parent::afterDelete();
		Comment::model()->deleteAll('post_id='.$this->id);
		Tags::model()->updateFrequency($this->tags,'');
	}


	public function addComment($comment)
	{
		if(Yii::app()->params['commentNeedApproval']){
			$comment->status = Comment::STATUS_PENDING;
		}else{
			$comment->status = Comment::STATUS_APPROVED;
		}
		$comment->post_id = $this->id;
		return $comment->save();
	}
	
}