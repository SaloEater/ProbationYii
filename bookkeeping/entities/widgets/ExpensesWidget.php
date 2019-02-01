<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 23.01.2019
 * Time: 13:57
 */

namespace bookkeeping\entities\widgets;

use bookkeeping\entities\Category;
use yii\base\Widget;
use yii\bootstrap\ButtonDropdown;
use yii\helpers\Url;

class ExpensesWidget extends Widget
{
    /**
     * @var Category $rootCategory
     */
    public $rootCategory;

    public function run()
    {
        $categories = CategoryWidget::widget([
            'rootCategory' => $this->rootCategory
        ]);

        $output = '';

        $output .= $categories;

        return $output;
    }
}