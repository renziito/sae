<?php
/* @var $this DefaultController */
/* @var $model Deuda */

$this->breadcrumbs = array(
    'Deudas'
);
?>

<h1>
    Administrador de Deudas    <a class="pull-right btn btn-success" href="<?= $this->createUrl("create") ?>">Nuevo</a>
</h1>


<div class="table-responsive">
    <?php
    $this->widget('zii.widgets.grid.CGridView', [
        'id'           => 'deuda-grid',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'denominacion',
            'monto',
            [
                'name'  => 'prueba',
                'value' => function($data) {
                    if ($data->prueba != "") {
                        $url = Yii::app()->getBaseUrl(true) . "/files/deudas/";
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
                'header' => 'Personas',
                'value'  => function($data) {
                    return UsuarioDeuda::model()->count('estado = 1 AND deuda_id = ' . $data->id);
                }
            ],
            'fecha_vencimiento',
            [
                'class'              => 'CButtonColumn',
                'template'           => '{update}{view}{delete}',
                'deleteConfirmation' => "js:'Se va a eliminar el evento : '+$(this).parent().parent().children(':nth-child(2)').text()+'?'",
            ],
        ],
    ]);
    ?>
</div>
