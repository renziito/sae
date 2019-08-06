<h3>Anuncios</h3>

<div class="row">
  <?php foreach ($anuncios as $anuncio): ?>
    <div class="col-lg-4">
      <div class="card card-transparent">
        <div class="card-body no-padding">
          <div id="card-circular-minimal" class="card card-default">
            <div class="card-header  ">
              <div class="card-title"><?= $anuncio->titulo ?></div>
            </div>
            <div class="card-body">
              <p><?= $anuncio->descripcion ?></p>
              <small class="pull-right"><?= $anuncio->fecha ?></small>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

