<h3>Anuncios</h3>

<div class="row">
    <?php foreach ($anuncios as $anuncio): ?>
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
</div>

