<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 22.10.2018
 * Time: 19:01
 */

namespace common\behaviours;

use yii;
use yii\base\Behavior;

class createWatcher extends Behavior
{
    /**
     * @var yii\db\ActiveRecord $activeRecord
     */
    public $activeRecord = null;

    public function events()
    {
        return [
            yii\db\ActiveRecord::EVENT_BEFORE_INSERT => 'watch',
        ];
    }

    public function watch()
    {
        $now = date('Y:m:d H:i:s', time());
        $this->activeRecord->created = $now;
    }
}