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
 * @property int $nameLength
 *
 * @property Filmngenres[] $filmngenres
 * @property ProducerNFilms[] $filmnproducers
 */
class Films extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        $own = [
            'createWatcher' => [
                'class' => 'common\behaviours\createWatcher',
                'obj' => $this,
            ],
            'updateWatcher' => [
                'class' => 'common\behaviours\updateWatcher',
                'obj' => $this,
            ],
            'whoCreateWatcher' => [
                'class' => 'common\behaviours\whoCreateWatcher',
                'obj' => $this,
            ],
        ];

        return array_merge(parent::behaviors(), $own);
    }

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
}
