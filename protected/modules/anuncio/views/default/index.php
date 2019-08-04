<?php
/* @var $this DefaultController */
/* @var $model Anuncio */

$this->breadcrumbs = array(
    'Anuncios' => array('index'),
    'Administrar',
);
?>

<h1>
    Administrador de Anuncios    <a class="pull-right btn btn-success" href="<?= $this->createUrl("create") ?>">Nuevo</a>
</h1>

<div class="table-responsive">
    <?php
    $this->widget('zii.widgets.grid.CGridView', [
        'id'           => 'anuncio-grid',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'titulo',
            'descripcion',
            [
                'name'  => 'comentarios',
                'value' => function($data) {
                    return AnuncioComentario::model()->count('estado = TRUE AND anuncio_id = ' . $data->id);
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
