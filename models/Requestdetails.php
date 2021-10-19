<?php

namespace app\models;


use Yii;
use yii\web\Session;

/**
 * This is the model class for table "requestdetails".
 *
 * @property int $requestId
 * @property string $bloodGroup
 * @property int $unitsNeeded
 * @property string $city
 * @property string $state
 * @property string $phoneNo
 * @property int $requestedBy
 * @property string $dateAndTime
 * @property int $isAccepted
 * @property string|null $acceptedTime
 *
 * @property Userdetails $requestedBy0
 */
class Requestdetails extends \yii\db\ActiveRecord 
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requestdetails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        /*$session = new Session;
        $session->open();
        $id1 = $session->get('id');*/
        return [
            [['bloodGroup', 'unitsNeeded', 'city', 'state', 'phoneNo','requestedBy'], 'required'],
            [['bloodGroup'], 'string'],
            [['unitsNeeded', 'requestedBy', 'isAccepted'], 'integer'],
            [['dateAndTime', 'acceptedTime'], 'safe'],
            [['city'], 'string', 'max' => 30],
            [['state'], 'string', 'max' => 25],
            [['phoneNo'], 'string', 'max' => 10, 'min'=>10],
            [['isAccepted'],'default','value'=>0],
            //[['requestedBy'],'default','value'=>$id1],
            [['requestedBy'], 'exist', 'skipOnError' => true, 'targetClass' => Userdetails::className(), 'targetAttribute' => ['requestedBy' => 'userId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'requestId' => 'Request ID',
            'bloodGroup' => 'Blood Group',
            'unitsNeeded' => 'Units Needed',
            'city' => 'City',
            'state' => 'State',
            'phoneNo' => 'Phone No',
            'requestedBy' => 'Requested By',
            'dateAndTime' => 'Date And Time',
            'isAccepted' => 'Is Accepted',
            'acceptedTime' => 'Accepted Time',
        ];
    }

    /**
     * Gets query for [[RequestedBy0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestedBy0()
    {
        return $this->hasOne(Userdetails::className(), ['userId' => 'requestedBy']);
    }
}
