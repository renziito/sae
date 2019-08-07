<h3>Mis Cuentas</h3>

<div class="row">
    <?php if ($deudas): ?>
        <?php foreach ($deudas as $deudas): ?>
            <div class="col-lg-4">
                <div class="card card-transparent">
                    <div class="card-body no-padding">
                        <div id="card-circular-minimal" class="card card-default">
                            <div class="card-body">
                                <h3><?= $anuncio->titulo ?></h3>
                                <p><?= $anuncio->descripcion ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-lg-4">
            <div class="card card-transparent">
                <div class="card-body no-padding">
                    <div id="card-circular-minimal" class="card card-default">
                        <div class="card-body">
                            <h3>No tiene cuentas Registradas</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

