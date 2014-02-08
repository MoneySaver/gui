<?php

/**
 * This is the model class for table "data".
 *
 * The followings are the available columns in table 'data':
 * @property string $id
 * @property string $sensor
 * @property string $value
 * @property string $created_at
 */
class Data extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Data the static model class
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
		return 'data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sensor, value created_at', 'safe'),
			array('sensor, value', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sensor, value, created_at', 'safe', 'on'=>'search'),
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
/*	public function afterFind() {

		parent::afterFind();
	}
*/	public function getState(){
		$maxrange=255;

		$val=($this->value>=$maxrange)?$maxrange:$this->value;
		$b=0;		
		$r=0;
		$g=round(255*$val/$maxrange);
		
/*		if ($this->value<50){
			$r=0;
			$g=254;
			$b=0;
		}elseif($this->value<70){
			$r=0;
			$g=0;
			$b=254;
		}elseif($this->value<90){
			$r=154;
			$g=100;
			$b=100;
		}elseif($this->value<100){
			$r=154;
			$g=100;
			$b=100;
		}elseif($this->value<120){
			$r=150;
			$g=10;
			$b=200;		
		}elseif($this->value<150){
			$r=250;
			$g=30;
			$b=30;	
		}else{
			$r=254;
			$g=0;
			$b=0;
		}
		$r=round(254*$val/$maxrange);
		return $r.",".$g.",".$b;*/

		if ($this->value<100){
			$a1="0";
		}else{
			$a1="255";
		}
		$a2=round(255*$val/$maxrange);
		return $a1.",".$a2;

	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sensor' => 'Sensor',
			'value' => 'Value',
			'created_at' => 'Created At',
		);
	}
	public function scopes() {
        return array(
            'power'=>array(
                'order'=>$this->getTableAlias(false,false) . ".created_at DESC",
                'limit'=>1,
                //'condition'=>"status>='10'",
                'condition'=>$this->getTableAlias(false,false) . ".sensor='Power1'",
            ),
            'energy'=>array(
                'order'=>$this->getTableAlias(false,false) . ".created_at DESC",
                'limit'=>1,
                'condition'=>$this->getTableAlias(false,false) . ".sensor='Energy1'",
            ),
            'temp'=>array(
                'order'=>$this->getTableAlias(false,false) . ".created_at DESC",
                'limit'=>1,
                'condition'=>$this->getTableAlias(false,false) . ".sensor='temperatuur'",
            ),
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('sensor',$this->sensor,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
	          'defaultOrder'=>'created_at DESC',
	        ),
			'pagination'=>array(
				'pagesize'=>30,
			)
		));
	}
}