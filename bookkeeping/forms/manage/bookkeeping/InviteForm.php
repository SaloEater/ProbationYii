<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 15.11.2018
 * Time: 21:33
 */

namespace bookkeeping\forms\manage\bookkeeping;


use yii\base\Model;

class InviteForm extends Model
{
    public $secret;

    public function __construct(array $config = [])
    {

        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['secret'], 'required'],
            [['secret'], 'string', 'max' => 255],
        ];
    }
}