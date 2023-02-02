<?php
namespace frontend\controllers;

use frontend\controllers\oldController\BackendController;
use common\services\RoleService;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use common\models\User;
use frontend\models\UserSearch;
use common\models\LoginForm;

class UserController extends BackendController
{
	/**
	 * @inheritdoc
	 */
	public function init()
	{
//		if (!is_dir($this->viewPath)) {
//			$this->viewPath = '@andrewdanilov/adminpanel/views/user';
//		}
		parent::init();
	}


	/**
	 * Login action.
	 *
	 * @return Response|string
	 */

	public function actionLogin()
	{
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}
		$loginForm = new LoginForm();
		if ($loginForm->load(Yii::$app->request->post()) && $loginForm->validate() && $loginForm->login()) {
			return $this->goBack();
		}
		if (Yii::$app->getSession()->getFlash('error') == 'access-denied') {
			// if we here because of access denied
			$loginForm->addError('username', 'Access denied for this user.');
		}
		$this->layout = '//login';
		return $this->render('login', [
			'model' => $loginForm,
		]);
	}
    public function behaviors()
    {
        return [
            'access' => [
                'class' => 'yii\filters\AccessControl',
                'only' => ['user/*', 'default/index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['user/login'],
                        'roles' => ['?'],
                        'denyCallback' => function ($rule, $action) {
                            throw new ForbiddenHttpException();

                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'user/*', 'create', 'delete', 'view', 'update'],
                        'roles' => ['@', 'admin', 'superAdmin'],
                        'matchCallback' => function () {
                            return (bool)Yii::$app->user->identity->is_admin;
                        },
                        'denyCallback' => function ($rule, $action) {
                            throw new ForbiddenHttpException();

                        },
                    ],
                ]
            ],
        ];
    }

	/**
	 * Logout action.
	 *
	 * @return Response
	 */
	public function actionLogout()
	{
		Yii::$app->user->logout();
		return $this->goHome();
	}

	public function actionIndex()
	{
		$searchModel = new \frontend\models\UserSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionUpdate($id=null)
	{
		if ($id === null) {
			$model = new User();
		} else {
			$model = User::findOne(['id' => $id]);
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            RoleService::setRole($model->id, $model->role);
			return $this->redirect(['index']);
		}
		return $this->render('update', ['model' => $model]);
	}

	public function actionDelete($id)
	{
		User::findOne(['id' => $id])->delete();
		return $this->redirect(['index']);
	}
}
