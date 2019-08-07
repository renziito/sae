<?php
/* @var $this DefaultController */
/* @var $model Deuda */

$this->breadcrumbs = array(
    'Deudas' => [$this->createUrl('index')],
    'Personas',
);

$id       = Yii::app()->request->getQuery('id');
$personas = QPersonas::getPersonas(false, false);
?>

<div class="card card-transparent m-t-30">
    <div class="card-body no-padding">
        <div id="card-circular-minimal" class="card card-default">
            <div class="card-body">
                <h3>Personas asociadas a la Deuda</h3>
                <p>
                    La deuda por <?= $model->denominacion ?> con un monto de
                    S/. <?= $model->monto ?> con fecha de vencimiento el 
                    <?= $model->fecha_vencimiento ?> esta asocionado a todas
                    personas de la lista de la derecha.
                </p>
                <p>
                    Para seleccionar a todas personas haz click 
                    <a href='#' class='action-select btn btn-xs btn-primary'
                       data-action="select_all"  data-id="select-personas">aqui</a>
                    y para remover a todos haz click 
                    <a href='#' class='action-select btn btn-xs btn-danger'
                       data-action="deselect_all" data-id="select-personas">aqui</a>
                </p>
                <br>
                <form method="POST">
                    <input type="hidden" name="Deuda[id]" value="<?= $id ?>"/>
                    <select multiple="multiple" class="searchable" id="select-personas" name="Deuda[personas][]">
                        <?php foreach ($personas as $persona): ?>
                            <option value='<?= $persona['id'] ?>'
                                <?= (QPersonas::hadDeuda($id, $persona['id']) ? 'selected' : '') ?>>
                                <?= $persona['nombre_completo'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="Submit" class="btn btn-success m-t-30">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>