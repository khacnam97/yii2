<?php

namespace app\controllers;

use app\models\File;
use Yii;
use app\models\Menu;
use app\models\MenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends Controller
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
     * Lists all Menu models.
     * @return mixed
     */

    function actionDatatree($data, $parent_id = 0, $level = 0){
        $result = [];
        foreach($data as $item){
            if($item['parent'] == $parent_id){
                $item['level'] = $level;
                $result[] = $item;
                unset($data[$item['id']]);
                $child = $this->actionDatatree($data, $item['id'], $level + 1 );
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }

    function bootstrap_menu($array,$parent = 0,$parents = array())
    {
        if($parent==0)
        {
            foreach ($array as $element) {
                if (($element['parent'] != 0) && !in_array($element['parent'],$parents)) {
                    $parents[] = $element['parent'];
                }
            }
        }
        $menu_html = '';
        foreach($array as $element)
        {
            if($element['parent']==$parent)
            {
                if(in_array($element['id'],$parents))//ktra
                {
                    $menu_html .= '<li class="dropdown">';
                    $menu_html .= '<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.$element['name'].' <span class="caret"></span></a>';
                }
                else {
                    $menu_html .= '<li>';
                    $menu_html .= '<a href="a">' . $element['name'] . '</a>';
                }
                if(in_array($element['id'],$parents))
                {
                    $menu_html .= '<ul class="dropdown-menu" role="menu">';
                    $menu_html .= $this->bootstrap_menu($array, $element['id'], $parents);
                    $menu_html .= '</ul>';
                }
                $menu_html .= '</li>';
            }
        }
        return $menu_html;
    }
    function buildTree(array $data, $parentId = 0) {
        $branch = array();
        foreach ($data as $element) {
            if ($element['parent'] == $parentId) {

                $children = $this->buildTree($data, $element['id']);

                $childrenCount = 0;
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element ;
            }

        }
        return $branch;
    }
    public function actionIndex()
    {
        $searchModel = new MenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $menu = (new \yii\db\Query())->select('*')->from('menu')->all();
        $menuItem = (new \yii\db\Query())->select('*')->from('menu')->where(['not', ['parent' => null]])->all();
//        $list_cat = $this->actionDatatree($menu, 0,0);
        $list_cat = $this->bootstrap_menu($menu, 0);
        $list_menu = $this->buildTree($menu, 0);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'menu' => $menu,
            'list_cat' => $list_cat,
            'menuItem' => $menuItem,
            'list_menu' => $list_menu
        ]);
    }

    /**
     * Displays a single Menu model.
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
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Menu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $level =$_POST['Menu']['level'];
            $idParent = $model->id;
            for ($i =0; $i< $level ;$i++){
                $menu = new Menu();
                $menu->name = 'item '.($i+1);
                $menu->parent = $idParent +$i;
                $menu->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Menu model.
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
     * Deletes an existing Menu model.
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
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
