<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4 mb-5">
    <div class="d-flex justify-content-end mb-4">
        <a class="btn btn-outline-secondary" href="<?= base_url('stanice/'.$stanice->bundesland); ?>" role="button">
            <i class="fas fa-arrow-left me-2"></i> Zpět na seznam stanic
        </a>
    </div>

    <div class="text-center mb-5">
        <h1 class="p-2" style="font-style: italic; font-size: 60px;">
            Data pro stanici <?= $stanice->place; ?>
        </h1>
        <p class="lead text-muted">Přehled meteorologických dat</p>
         <img src="<?= base_url('img/icon4.png'); ?>" class="img-fluid my-3" style="width: 100px;" alt="Ikona">
    </div>

    <div class="d-flex justify-content-center mb-4">
        <?php if ($pager): ?>
            <?= $pager->links('default', 'bootstrap_full') ?> 
        <?php endif ?>
    </div>

    <div class="table-responsive shadow-lg rounded-3">
        <?php 
        $table = new \CodeIgniter\View\Table();

        $template = [
            'table_open' => '<table class="table table-bordered table-striped table-hover table-sm align-middle">',
            'thead_open' => '<thead class="table-primary text-center">',
            'thead_close' => '</thead>',
            'heading_row_start' => '<tr>',
            'heading_row_end' => '</tr>',
            'heading_cell_start' => '<th scope="col" class="text-nowrap">',
            'heading_cell_end' => '</th>',
            'tbody_open' => '<tbody>',
            'tbody_close' => '</tbody>',
            'row_start' => '<tr>',
            'row_end'  => '</tr>',
            'cell_start' => '<td class="text-center">',
            'cell_end' => '</td>',
            'table_close' => '</table>'
        ];

        $table->setTemplate($template);

        $table->setHeading(
            'Datum', 'Kvalita', 'Min. T 5cm', 'Min. T 2m', 'Mid. T 2m', 'Max. T 2m',
            'Vlhkost', 'Mid. Vítr', 'Max. Vítr', 'Světlo (min)',
            'Mid. Mraky', 'Srážky', 'Mid. Tlak'
        );

        foreach ($dataStanic as $row) {
            $table->addRow(
                date('d.m.Y', strtotime($row->date)), 
                $row->quality, $row->min_5cm, $row->min_2m,
                $row->mid_2m, $row->max_2m, $row->humidity, $row->mid_wwind ?? $row->mid_wind,
                $row->max_wind, $row->sun_length, $row->mid_cloud,
                $row->precipitation, $row->mid_air_pressure
            );
        }

        echo $table->generate();
        ?>
    </div><br> 
    
    <div class="d-flex justify-content-center mt-4">
        <?php if ($pager): ?>
            <?= $pager->links('default', 'bootstrap_full') ?> 
        <?php endif ?>
    </div>

</div>

<?= $this->endSection(); ?>