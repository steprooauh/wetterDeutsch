<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4 mb-5">
    
    <div class="d-flex justify-content-end mb-4">
        <a class="btn btn-outline-secondary" href="<?= base_url(); ?>" role="button">
            <i class="fas fa-arrow-left me-2"></i> Zpět na seznam zemí
        </a>
    </div>

    <div class="text-center mb-5">
        <h1  class="p-2" style="font-style: italic; font-size: 60px;">
            Stanice v zemi <?= $zeme->name; ?>
        </h1>
        <img src="<?= base_url('img/icon3.png'); ?>" class="img-fluid my-3" style="width: 100px;" alt="Ikona">
    </div>

    <div class="row justify-content-center g-4 mb-5">
        
        <div class="col-lg-6 col-md-8 col-12">
            <div class="shadow-lg rounded overflow-hidden">
                <img src="<?= base_url('img/mapy/'.$zeme->picmap); ?>" class="img-fluid w-100"
                    style="border: 2px solid #ccc; max-height: 400px; object-fit: contain;"
                    alt="Mapa <?= $zeme->name ?>">
            </div>
            <p class="text-center mt-2 text-muted">Mapa spolkové země <?= $zeme->name; ?></p>
        </div>

        <div class="col-lg-4 col-md-4 col-8 d-flex flex-column align-items-center justify-content-center">
            <div class="shadow-lg rounded overflow-hidden border border-3 border-dark">
                <img src="<?= base_url('img/vlajky/'.$zeme->picflag); ?>" class="img-fluid w-100"
                    style="max-height: 250px; object-fit: contain;"
                    alt="Vlajka <?= $zeme->name ?>">
            </div>
            <p class="text-center mt-2 text-muted">Vlajka spolkové země <?= $zeme->name; ?></p>
        </div>

    </div>

    <h2 class="text-center mb-4 text-secondary border-bottom pb-2">Seznam meteorologických stanic</h2>

    <div class="row">
        <?php foreach ($stanice as $row): ?>
            <div class="col-lg-6 col-md-6 col-12 mb-4">
                <div class="card shadow-sm h-100 border-start border-secondary border-5">
                    <div class="card-body">
                        <h5 class="card-title mb-3 fw-bold text-center">
                            <?= anchor('data/' . $row->S_ID, $row->place, ['class' => 'text-decoration-none text-dark']); ?>
                        </h5>
                        
                        <ul class="list-unstyled small">
                            <li><i class="fas fa-compass me-2"></i> **Šířka:** <?= $row->geo_latitude ?></li>
                            <li><i class="fas fa-compass me-2"></i> **Délka:** <?= $row->geo_longtitude ?></li>
                            <li><i class="fas fa-mountain me-2"></i> **Výška:** <?= $row->height ?> m. n. m.</li>
                        </ul>
                        
                        <a href="<?= base_url('data/' . $row->S_ID); ?>" class="btn btn-sm btn-outline-dark mt-2 ">
                            Zobrazit data <i class="fas fa-chart-line ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?= $this->endSection(); ?>