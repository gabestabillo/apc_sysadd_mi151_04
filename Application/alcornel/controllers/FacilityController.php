<?php

namespace app\controllers;

use Yii;
use app\models\facility;
use app\models\facilitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FacilityController implements the CRUD actions for facility model.
 */
class FacilityController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all facility models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new facilitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single facility model.
     * @param integer $id
     * @param integer $checklist_id
     * @return mixed
     */
    public function actionView($id, $checklist_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $checklist_id),
        ]);
    }

    /**
     * Creates a new facility model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new facility();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'checklist_id' => $model->checklist_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing facility model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $checklist_id
     * @return mixed
     */
    public function actionUpdate($id, $checklist_id)
    {
        $model = $this->findModel($id, $checklist_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'checklist_id' => $model->checklist_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing facility model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $checklist_id
     * @return mixed
     */
    public function actionDelete($id, $checklist_id)
    {
        $this->findModel($id, $checklist_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the facility model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $checklist_id
     * @return facility the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $checklist_id)
    {
        if (($model = facility::findOne(['id' => $id, 'checklist_id' => $checklist_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
