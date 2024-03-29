<?php

class DefaultController extends Controller {

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     */
    public function actionCreate() {
        $model = new Kardex;
        $post  = Yii::app()->request->getPost('Kardex', false);

        if ($post) {
            $model->attributes = $post;
            if ($model->save()) {
                $file = CUploadedFile::getInstance($model, 'prueba');

                if (trim($file) != "") {
                    $data = Files::getNombreExtensionFile($file->name);
                    $name = $model->id . '_' . date('dHis');
                    $ext  = $data['extension'];

                    $urlFile = Yii::getPathofAlias('webroot.files.pruebas');
                    $ruta    = $urlFile . "/" . $name . "." . $ext;
                    Files::createDir($urlFile);
                    if ($file->saveAs($ruta)) {
                        $modelo         = $this->loadModel($model->id);
                        $modelo->prueba = $name . "." . $ext;
                        if (!$modelo->update()) {
                            throw new Exception("No se puede guardar la foto [logicamente]");
                        }
                    } else {
                        throw new Exception("No se puede guardar la foto [fisicamente]");
                    }
                }

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
        $post  = Yii::app()->request->getPost('Kardex', false);

        if ($post) {
            $file = CUploadedFile::getInstance($model, 'prueba');
            if (trim($file) == "") {
                $post['prueba'] = $model->prueba;
            }
            $model->attributes = $post;

            if ($model->save()) {

                if (trim($file) != "") {
                    $data = Files::getNombreExtensionFile($file->name);
                    $name = $model->id . '_' . date('dHis');
                    $ext  = $data['extension'];

                    $urlFile = Yii::getPathofAlias('webroot.files.pruebas');
                    $ruta    = $urlFile . "/" . $name . "." . $ext;
                    Files::createDir($urlFile);
                    if ($file->saveAs($ruta)) {
                        $modelo         = $this->loadModel($model->id);
                        $modelo->prueba = $name . "." . $ext;
                        $modelo->update();
                    }
                }

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
        $model      = new Kardex('search');
        $model->unsetAttributes();  // clear any default values
        $attributes = Yii::app()->request->getQuery('Kardex', false);
        if ($attributes) {
            $model->attributes = $attributes;
        }
        $this->render('index', ['model' => $model]);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Kardex the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Kardex::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'La página solicitada no existe.');
        }
        return $model;
    }

}
