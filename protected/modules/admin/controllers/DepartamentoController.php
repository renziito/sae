<?php

class DepartamentoController extends Controller {

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     */
    public function actionCreate() {
        $model = new Departamento;
        $post  = Yii::app()->request->getPost('Departamento', false);

        if ($post) {
            $model->attributes = $post;
            if ($model->save()) {
                $this->redirect(['index']);
            }
        }

        $this->render('create', ['model' => $model]);
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'index' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $post  = Yii::app()->request->getPost('Departamento', false);

        if ($post) {
            $model->attributes = $post;
            if ($model->save()) {
                $this->redirect(['index']);
            }
        }

        $this->render('update', ['model' => $model]);
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model         = $this->loadModel($id);
        $model->estado = 0;

        if ($model->save()) {
            $this->redirect(['index']);
        }
    }

    /**
     * Manages all models.
     */
    public function actionIndex() {
        $model      = new Departamento('search');
        $model->unsetAttributes();  // clear any default values
        $attributes = Yii::app()->request->getQuery('Departamento', false);
        if ($attributes) {
            $model->attributes = $attributes;
        }
        $this->render('index', ['model' => $model]);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Departamento the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Departamento::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'La página solicitada no existe.');
        }
        return $model;
    }

    public function actionView($id) {
        $post   = Yii::app()->request->getPost('UsuarioDepartamento', false);
        $actual = UsuarioDepartamento::model()->find(
                'estado = 1 AND (hasta >="' . date('Y-m-d') . '"   
                OR hasta = "0000-00-00")
                AND departamento_id = ' . $id);

        if ($post) {
            if (!$actual) {
                $actual = new UsuarioDepartamento();
            }

            $actual->attributes = $post;
            $actual->save();
        }

        $pasado = UsuarioDepartamento::model()->findAll(
                'estado = 1 AND (hasta <"' . date('Y-m-d') . '"   
                AND hasta != "0000-00-00")
                AND departamento_id = ' . $id);

        $this->render('view', compact('actual', 'pasado'));
    }

}
