<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "text".
 *
 * @property int $id
 * @property string $icon
 * @property string $text
 * @property string $created_at
 */
class Texts extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'text';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['icon', 'text'], 'required'],
            [['created_at'], 'safe'],
            [['icon', 'text'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'icon' => 'Icon',
            'text' => 'Text',
            'created_at' => 'Created At',
        ];
    }

}
