<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "producers".
 *
 * @property int $id
 * @property string $name
 *
 * @property producer_n_films[] $producer_n_films
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
            [['name'], 'required'],
            ['name', 'string']
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
    public function getProducer_n_films()
    {
        return $this->hasMany(producer_n_films::className(), ['producer_id' => 'id']);
    }
}
