<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 06.01.2019
 * Time: 14:50
 */

namespace bookkeeping\services\util;

use bookkeeping\constants\SelfPostActions;
use bookkeeping\entities\Category;
use bookkeeping\services\manage\bookkeeping\CategoryService;
use bookkeeping\services\manage\bookkeeping\TransactionService;
use http\Exception\InvalidArgumentException;

class SelfPostService
{

    public function execute($post)
    {
        $body = $this->tryToParseRequest($post);
        if ($body == null) {
            return;
        }
        $operation = $body['operation'];
        if ($operation == SelfPostActions::$category_remove) {
            $id = $body['id'];
            /**
             * @var $categoryService CategoryService
             */
            $categoryService = \Yii::$container->get(CategoryService::class);
            $categoryService->removeById($id);
        } elseif ($operation == SelfPostActions::$transaction_remove) {
            $id = $body['id'];
            /**
             * @var $transactionService TransactionService
             */
            $transactionService = \Yii::$container->get(TransactionService::class);
            $transactionService->removeById($id);
        } elseif ($operation == SelfPostActions::$category_fullremove) {
            $id = $body['id'];
            /**
             * @var $categoryService CategoryService
             */
            $categoryService = \Yii::$container->get(CategoryService::class);
            $categoryService->removeByIdWithChildrens($id);
        } elseif ($operation == SelfPostActions::$category_move_to) {
            $id = $body['id'];
            $destination = $body['destination'];
            /**
             * @var $category Category
             */
            /**
             * @var $categoryService CategoryService
             */
            $categoryService = \Yii::$container->get(CategoryService::class);
            $categoryService->moveTo($id, $destination);
        } else {
            throw new InvalidArgumentException("Operation $operation hasn't implementation!");
        }
    }

    /**
     * @param $post array
     * @return array
     */
    public function tryToParseRequest($post)
    {
        if (!isset($post['type']) || $post['type'] != 'self_post') {
            return null;
        }

        return $post;
    }

}