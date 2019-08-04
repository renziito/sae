<?php
/* @var $this DefaultController */
/* @var $model Kardex */

$this->breadcrumbs = array(
    'Kardex'
);
?>

<h1>
    Administrador de Kardex    <a class="pull-right btn btn-success" href="<?= $this->createUrl("create") ?>">Nuevo</a>
</h1>

<div class="table-responsive">
    <?php
    $this->widget('zii.widgets.grid.CGridView', [
        'id'           => 'kardex-grid',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            [
                'name'  => 'tipo',
                'value' => function($data) {
                    return ($data->tipo == 1 ? "INGRESO" : "SALIDA");
                }
            ],
            'denominacion',
            'monto',
            [
                'name'  => 'prueba',
                'value' => function($data) {
                    if ($data->prueba != "") {
                        $url = Yii::app()->getBaseUrl(true) . "/files/pruebas/";
                        $url .= $data->prueba;

                        $content = "";
                        if (@is_array(getimagesize($url))) {
                            $content = '<img height="30" src="' . $url . '"/>';
                        } else {
                            $content = '<i class="fas fa-2x fa-external-link-alt"></i>';
                        }

                        echo '<a target="_blank" href="' . $url . '">' . $content . '</a>';
                    }
                }
            ],
            [
                'name'  => 'fecha_kardex',
                'value' => function($data) {
                    echo date('d-m-Y', strtotime($data->fecha_kardex));
                }
            ],
            [
                'class'              => 'CButtonColumn',
                'template'           => '{update}{delete}',
                'deleteConfirmation' => "js:'Se va a eliminar el evento : '+$(this).parent().parent().children(':nth-child(2)').text()+'?'",
            ],
        ],
    ]);
    ?>
</div>
