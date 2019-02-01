<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 23.01.2019
 * Time: 13:17
 */

namespace bookkeeping\entities\widgets;

use yii\widgets\MaskedInput;

class DateMaskedInput extends MaskedInput
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'input-31',
            'clientOptions' => ['alias' =>  'date']
        ]);
    }
}