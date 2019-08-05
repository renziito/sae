<?php
/* @var $this DefaultController */
/* @var $model Deuda */

$this->breadcrumbs = array(
    'Deudas' => [$this->createUrl('index')],
    'Personas',
);
?>

<div class="card card-transparent m-t-30">
    <div class="card-body no-padding">
        <div id="card-circular-minimal" class="card card-default">
            <div class="card-body">
                <h3>Personas asociadas a la Deuda</h3>
                <p>
                    Click on the refresh icon to simulate an AJAX 
                    call and to see an animated circular progress 
                    indicatorabove the portlet. This is the Pages 
                    default progress indicator for Cards. Don't like
                    this style? Simply change the style by setting portlet
                    options.
                </p>
                <br>
                <select multiple="multiple" class="multi-select" name="my-select[]">
                    <option value='elem_1'>elem 1</option>
                    <option value='elem_2'>elem 2</option>
                    <option value='elem_3'>elem 3</option>
                    <option value='elem_4'>elem 4</option>
                    <option value='elem_100'>elem 100</option>
                </select>
                <?php foreach ($personas as $persona): ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php
Utils::show($model);
Utils::show($personas);
?>