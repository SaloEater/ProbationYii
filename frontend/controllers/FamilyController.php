<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 18.11.2018
 * Time: 16:26
 */

namespace frontend\controllers;

use bookkeeping\entities\Category;
use bookkeeping\repositories\bookkeeping\FamilyRepository;
use bookkeeping\services\manage\bookkeeping\CategoryService;
use bookkeeping\services\manage\bookkeeping\FamilyMemberService;
use Yii;
use bookkeeping\entities\Family;
use bookkeeping\repositories\bookkeeping\FamilyMemberRepository;
use bookkeeping\services\manage\bookkeeping\FamilyService;
use yii\base\Module;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class FamilyController extends Controller
{
    private $memberService;
    private $familyService;
    private $categoryService;

    public function __construct(
        string $id,
        Module $module,
        FamilyMemberService $memberService,
        FamilyService $familyService,
        CategoryService $categoryService,
        array $config = []
    ) {
        $this->memberService = $memberService;
        $this->familyService = $familyService;
        $this->categoryService = $categoryService;
        parent::__construct($id, $module, $config);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        //'actions' => ['index', 'create', 'new', 'join'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        /**
         * @var FamilyMemberRepository $memberRepo
         */
        if (!$this->memberService->exists($this->currentUserId())) {
            return $this->redirect('family/create');
        }

        $familyId = $this->currentUserFamilyId();
        $family = (new FamilyRepository())->get($familyId);
        $rootCategory = $this->categoryService->getFamilyRoot($familyId);

        /*$newCategory = $this->categoryService->createHandmaded(
            $this->currentUserId(),
            'New',
            $familyId,
            $rootCategory->id
        );*/

        return $this->render('index', [
            'family' => $family,
            'rootCategory' => $rootCategory,
        ]);
    }

    private function currentUserId()
    {
        return Yii::$app->user->id;
    }

    private function currentUserFamilyId(): int
    {
        return $this->memberService->getFamilyOf($this->currentUserId());
    }

    public function actionCreate()
    {
        if ($this->memberService->exists($this->currentUserId())) {
            return $this->redirect('/../family');
        }

        return $this->render('create');
    }

    public function actionNew()
    {
        if (!$this->memberService->exists($this->currentUserId())) {
            $userId = Yii::$app->user->id;
            //TODO: Create family and family member

            /**
             * @var Family $family
             */
            $this->familyService->create($userId);
        }

        return $this->redirect(Url::to('/../family'));
    }

    public function actionJoin()
    {
        //TODO: Parse invite form

        return $this->render('join');
    }

    /**
     * Deletes an existing Family model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        /**
         * @var FamilyService $service
         */
        $this->familyService->remove($id);

        return $this->redirect(['index']);
    }
}