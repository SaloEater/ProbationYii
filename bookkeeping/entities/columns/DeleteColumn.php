<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 18.11.2018
 * Time: 16:18
 */

namespace bookkeeping\entities\columns;


use yii\grid\ActionColumn;

class DeleteColumn extends ActionColumn
{

    protected function initDefaultButtons()
    {
        $this->initDefaultButton('delete', 'trash', [
            'data-confirm' => \Yii::t('yii', 'Are you sure you want to delete this item?'),
            'data-method' => 'post',
        ]);
    }
}