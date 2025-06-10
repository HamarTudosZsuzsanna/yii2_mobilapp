<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trainings".
 *
 * @property int $id
 * @property string $date
 * @property string $players
 */
class Trainings extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trainings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'players'], 'required'],
            [['date'], 'safe'],
            [['players'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'players' => 'Players',
        ];
    }

}
