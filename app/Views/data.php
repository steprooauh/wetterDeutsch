<?= $this->extend('layout/template');  ?>
<?= $this->section('content'); ?>

<h1 class="text-center p-2" style="font-style: italic; font-size: 60px ; margin-top: 80px">
    Data pro stanici <?= $stanice->place; ?>
</h1>

<?= $this->include('Pagers/back'); ?>

<?php if ($pager): ?>
    <?= $pager->links('default', 'bootstrap_full') ?>
<?php endif ?>



<?php 
$table = new \CodeIgniter\View\Table();

$template = [
    'table_open' => '<table class="table table-bordered table-striped">',
    'thead_open' => '<thead>',
    'thead_close' => '</thead>',
    'heading_row_start' => '<tr>',
    'heading_row_end' => '</tr>',
    'heading_cell_start' => '<th>',
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

$table->setHeading('Datum', 'Kvalita', 'Min. 5cm', 'Min. 2m', 'Mid. 2m', 'Max. 2m', 'Humidity', 'Mid. vítr', 'Max. vítr', 'Délka svitu', 'Mid. mraky', 'Precipitation', 'Mid. tlak');

foreach ($dataStanic as $row) {
    $table->addRow(
        $row->date, $row->quality, $row->min_5cm, $row->min_2m, $row->mid_2m, 
        $row->max_2m, $row->humidity, $row->mid_wind, $row->max_wind, 
        $row->sun_length, $row->mid_cloud, $row->precipitation, $row->mid_air_pressure
    );
}

echo $table->generate();
?>

<?= $this->endSection(); ?>
