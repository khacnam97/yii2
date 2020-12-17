<?php

namespace app\controllers;

use app\models\Employee;
use app\models\Img;
use app\models\User;
use Yii;
use app\models\Post;
use app\models\PostSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],

            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['author'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['author'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['author'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['author'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['author'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $model = new Post();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            'model'        => $model
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
//        if(Yii::$app->user->can('createPost')){
            $model = new Post();
            $img = new Img();
            if ($model->load(Yii::$app->request->post()) && $model->save() ) {
                if ($model->validate()) {
                    $nameImg = UploadedFile::getInstance($model, 'img_path');
                    if($nameImg){
                        $path ='uploads/' . $nameImg->baseName . '.' . $nameImg->extension;
                        if ($nameImg->saveAs($path)){
                            $img->img_path = $nameImg->baseName . '.' . $nameImg->extension;
                            $img->post_id = $model->id;
                            $img->save();
                        }
                    }
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
            if (Yii::$app->request->isAjax) {
                $data = Yii::$app->request->post();
                $name= $data['name'];
                $model->name = $name;

                $model->title= $data['title'];
                $model->employee_id= $data['employee_id'];
                $model->save();
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return [
//                'search' => $search,
                    'code' => 100,
                ];
            }

            return $this->render('create', [
                'model' => $model,
            ]);
//        }
//        else{
//            throw new ForbiddenHttpException;
//        }

    }
    public function actionPost()
    {
        $model = new Post();
        return $this->renderAjax('index', [
            'model' => $model,
        ]);

    }
    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('updatePost')){
            $model = $this->findModel($id);
            $employeName = Employee::find()->all();
            $img = new Img();
            $imgUpdate = (new \yii\db\Query())->select('id')->from('imgs')->where(['post_id' => $id])->one();

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    if(!$imgUpdate){
                        if ($model->validate()) {
                            $nameImg = UploadedFile::getInstance($model, 'img_path');
                            $path ='uploads/' . $nameImg->baseName . '.' . $nameImg->extension;
                            if ($nameImg->saveAs($path)){
                                $img->img_path = $nameImg->baseName . '.' . $nameImg->extension;
                                $img->post_id = $model->id;
                                $img->save();
                            }
                        }
                    }
                    else{
                        $idImg =$imgUpdate['id'];
                        $imgEdit = Img::findOne($idImg);
                        if ($model->validate()) {
                            $nameImg = UploadedFile::getInstance($model, 'img_path');
                            $path ='uploads/' . $nameImg->baseName . '.' . $nameImg->extension;
                            if ($nameImg->saveAs($path)){
                                $imgEdit->img_path = $nameImg->baseName . '.' . $nameImg->extension;
                                $imgEdit->save();
                            }
                        }

                    }

                    return $this->redirect(['view', 'id' => $model->id]);
                }


            return $this->render('update', [
                'model' => $model,'employeName' => $employeName,
            ]);
        }
        else{
            throw new ForbiddenHttpException;
        }

    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
