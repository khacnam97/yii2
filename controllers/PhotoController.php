<?php

namespace app\controllers;

use Yii;
use app\models\Photo;
use app\models\PhotoSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PhotoController implements the CRUD actions for Photo model.
 */
class PhotoController extends Controller
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
     * Lists all Photo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PhotoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Photo model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $photos =  (new \yii\db\Query())->select('photo_path')->from('photos')->where(['user_id' => $id])->all();
//        $ddd =$photos['1']['photo_path'];
        return $this->render('view', [
            'photos' => $photos,
        ]);
    }

    /**
     * Creates a new Photo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Photo();

        if ($model->load(Yii::$app->request->post())) {
               $files = UploadedFile::getInstances($model, 'photo_path');
               $title =$model->title;
                foreach ($files as $file) {
                        $path ='uploads/' . $file->baseName . '.' . $file->extension;
                        if ($file->saveAs($path)){
                            $photopath = $file->baseName . '.' . $file->extension;
                            $userId = Yii::$app->user->identity->id;
                            $time=time();
                            $group = Yii::$app->user->identity->id .'_'. $time;
                            Yii::$app->db->createCommand()->insert('photos', ['photo_path' => $photopath ,'user_id' => $userId,'group' => $group,'title' => $title])->execute();
                        }
                }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Photo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $photos =  (new \yii\db\Query())->select('photo_path')->from('photos')->where(['user_id' => $id])->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'photos' => $photos
        ]);
    }

    /**
     * Deletes an existing Photo model.
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
     * Finds the Photo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Photo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Photo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
