<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 11.11.2018
 * Time: 16:14
 */

namespace frontend\controllers\auth;


use bookkeeping\forms\manage\bookkeeping\ProfileForm;
use bookkeeping\services\manage\bookkeeping\AccountService;
use bookkeeping\services\manage\bookkeeping\ProfileService;
use Yii;
use bookkeeping\forms\manage\user\SignupForm;
use bookkeeping\services\auth\SignupService;
use yii\base\Module;
use yii\filters\AccessControl;
use yii\web\Controller;

class SignupController extends Controller
{

    /**
     * @var SignupService $signupService
     */
    private $signupService;

    public function __construct(string $id, Module $module, SignupService $signupService, array $config = [])
    {
        $this->signupService = $signupService;
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        /**
         * @var ProfileService $profileService
         */
        $profileService = Yii::$container->get(ProfileService::class);
        $signupForm = new SignupForm();
        $profileForm = new ProfileForm();

        if ($signupForm->load(Yii::$app->request->post()) && $signupForm->validate() &&
            $profileForm->load(Yii::$app->request->post()) && $profileForm->validate()) {
            try {
                $user = $this->signupService->signup($signupForm);
                $profileForm->userId = $user->id;
                $profileService->create($profileForm);
                Yii::$container->get(AccountService::class)->createForId($user->id);
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            } catch (\DomainException $e) {
                Yii::$app->session->setFlash('error', $e->getMessage());
                Yii::$app->errorHandler->logException($e);
            }
        }

        return $this->render('signup', [
            'signupForm' => $signupForm,
            'profileForm' => $profileForm,
        ]);
    }

}