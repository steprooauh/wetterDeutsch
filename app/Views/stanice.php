<?= $this->extend('layout/template');  ?>
<?= $this->section('content'); ?>

<h1 class="text-center p-2" style="font-style: italic; font-size: 60px ; margin-top: 80px">Stanice v zemi <?= $zeme->name; ?> </h1><br>
<img src="<?= base_url('img/icon3.png'); ?>" style="width: 10%; margin-top: -230px;">
<?= $this->include('Pagers/back'); ?>

<div class="row">
    <img class="col-6" src="<?= $mapa_soubor ?>" alt="Mapa <?= $zeme->name ?>">
    <img class="col-6" src="<?= $vlajka_soubor ?>" alt="Vlajka <?=  $zeme->name ?>">
</div>

<div class="row">
    <?php foreach ($stanice as $row): ?>
        <div class="col-6 p-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= anchor('data/' . $row->S_ID, $row->place); ?></h5>
                    <p class="card-text">Geografická šířka: <?= $row->geo_latitude ?></p>
                    <p class="card-text">Geografická délka: <?= $row->geo_longtitude ?></p>
                    <p class="card-text">Geografická výška: <?= $row->height ?></p>
                    <p class="card-text">Operátor: <?= $row->operator ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<?= $this->endSection(); ?>