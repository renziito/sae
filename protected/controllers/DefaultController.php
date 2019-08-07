<?php

class DefaultController extends Controller {

  public function actionIndex() {
    $this->render('index');
  }

  public function actionAnuncios() {
    $anuncios = Anuncio::model()->findAll('estado = 1 ORDER BY fecha DESC');
    $this->render('anuncios', compact('anuncios'));
  }

  public function actionCuentas() {
    $anuncios = Anuncio::model()->findAll('estado = 1 ORDER BY fecha DESC');
    $this->render('anuncios', compact('anuncios'));
  }

  public function actionPerfil() {
    $id    = Yii::app()->request->getQuery('iden', Yii::app()->user->id);
    $user  = Usuario::model()->findbyPk($id);
    $post  = Yii::app()->request->getPost('Usuario', false);
    $error = false;
    if ($post) {
      if (password_verify($post['contrasena'], $user->password)) {
        $user->attributes = $post;
        if ($post['fecha_nacimiento'] == "") {
          $user->fecha_nacimiento = null;
        }
        if (isset($post['nclave']) && $post['nclave'] != "") {
          if ($this->validateChange($post)) {
            $user->password = password_hash($post['nclave'], PASSWORD_DEFAULT);
          } else {
            $error = "EN EL CAMBIO DE CONTRASEÑA";
          }
        }
      } else {
        $error = "LA CONTRASEÑA NO ES CORRECTA";
      }
      if (!$error) {
        $user->update();
        $this->redirect($this->createUrl('perfil'));
      }
    }
    $this->render('perfil', compact('user', 'error'));
  }

  function validateChange($data) {
    if (!isset($data['nclavedos']) && $data['nclavedos'] != "") {
      return false;
    }

    if ($data['nclave'] != $data['nclavedos']) {
      return false;
    }
    return true;
  }

}
