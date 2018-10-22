<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "films".
 *
 * @property int $id
 * @property string $name
 * @property int $year
 * @property string $created
 * @property string whoCreate
 * @property string $updated
 *
 * @property Filmngenres[] $filmngenres
 * @property ProducerNFilms[] $filmnproducers
 */
class Films extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'films';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['year'], 'integer'],
            [['created'], 'string'],
            [['whoCreate'], 'string'],
            [['updated'], 'string'],
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
            'year' => 'Year',
            'created' => 'Created',
            'whoCreate' => 'By',
            'updated' => 'Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmngenres()
    {
        return $this->hasMany(FilmNGenres::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmnproducers()
    {
        return $this->hasMany(ProducerNFilms::className(), ['film_id' => 'id']);
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        //Fake changing
        $now = date('Y-m-d H:i:s', time());
        if ($this->getIsNewRecord()) {
            $this->created = $now;
            $this->whoCreate = $this->getUser()->username;
        }
        $this->updated = $now;

        return parent::save($runValidation, $attributeNames);
    }

    /**
     * @throws \Throwable
     * @return User
     */
    private function getUser()
    {
        return Yii::$app->user->getIdentity();
    }
}
