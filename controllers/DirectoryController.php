<?php

namespace app\controllers;

use app\models\File;
use Yii;
use app\models\Directory;
use app\models\DirectorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DirectoryController implements the CRUD actions for Directory model.
 */
class DirectoryController extends Controller
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
        ];
    }

    /**
     * Lists all Directory models.
     * @return mixed
     */

    function actionDatatree($data, $parent_id = 0, $level = 0){
        $result = [];
        foreach($data as $item){
            if($item['parentId'] == $parent_id){
                $item['level'] = $level;
                $result[] = $item;
                unset($data[$item['id']]);
                $child = $this->actionDatatree($data, $item['id'], $level + 1 );
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }
    function buildTree(array $data, $parentId = 0) {
        $branch = array();
       
        foreach ($data as $element) {
            if ($element['parentId'] == $parentId) {
                $soFile = File::find()->where(['directoryId' => $element['id']])->count();
                $children = $this->buildTree($data, $element['id']);
                $childrenCount = 0;
//                $tong = $soFile + $a;
                if ($children) {
                    $element['children'] = $children;
                    foreach ($children as $child) {
                        $childrenCount += $child['count'];
                    }
                }

                $element['count'] = $soFile + $childrenCount;

                $branch[] = $element ;
            }
        }
        return $branch;
    }

    public function actionIndex()
    {
        $searchModel = new DirectorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $directory = (new \yii\db\Query())->select('*')->from('directory')->all();
        $list_cat = $this->actionDatatree($directory, 0,0);
        $foder =$this->buildTree($directory, 0);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'list_cat' => $list_cat,
            'foder'   => $foder
        ]);
    }

    /**
     * Displays a single Directory model.
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
     * Creates a new Directory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Directory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Directory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Directory model.
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
     * Finds the Directory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Directory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Directory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
