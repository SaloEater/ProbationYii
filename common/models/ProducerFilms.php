<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "filmnproducers".
 *
 * @property int $id
 * @property int $film_id
 * @property int $producer_id
 *
 * @property Films $film
 * @property Producers $producer
 */
class ProducerFilms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filmnproducers';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->dbfilms;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['film_id', 'producer_id'], 'integer'],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Films::className(), 'targetAttribute' => ['film_id' => 'id']],
            [['producer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producers::className(), 'targetAttribute' => ['producer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'film_id' => 'Film ID',
            'producer_id' => 'Producer ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Films::className(), ['id' => 'film_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducer()
    {
        return $this->hasOne(Producers::className(), ['id' => 'producer_id']);
    }
}
