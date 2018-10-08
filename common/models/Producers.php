<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "producers".
 *
 * @property int $id
 * @property string $name
 *
 * @property Filmnproducers[] $filmnproducers
 */
class Producers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmnproducers()
    {
        return $this->hasMany(Filmnproducers::className(), ['genre_id' => 'id']);
    }
}
