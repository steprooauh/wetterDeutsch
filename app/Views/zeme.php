<?= $this->extend('layout/template');  ?>
<?= $this->section('content'); ?>

<h1 class="text-center p-2" style="font-style: italic; font-size: 80px ; margin-top: 60px">Přehled zemí v Německu</h1><br>
<img src="img/icon2.png" style="width: 10%; margin-top: -230px;">
<?php
$table = new \CodeIgniter\View\Table(); //promena table ma parametry CodeIgniter\View\Table

$template = array( //bootstrap tabulka, arraylist
    'table_open' => '<table class="table table-bordered table-striped">',
    'thead_open' => '<thead>',
    'thead_close' => '</thead>',
    'heading_row_start' => '<tr>',
    'heading_row_end' => ' </tr>',
    'heading_cell_start' => '<th>',
    'heading_cell_end' => '</th>',
    'tbody_open' => '<tbody>',
    'tbody_close' => '</tbody>',
    'row_start' => '<tr>',
    'row_end'  => '</tr>',
    'cell_start' => '<td class="text-center">',
    'cell_end' => '</td>',
    'row_alt_start' => '<tr>',
    'row_alt_end' => '</tr>',
    'cell_alt_start' => '<td class="text-center">',
    'cell_alt_end' => '</td>',
    'table_close' => '</table>'
);

$table->setTemplate($template);

$table->setHeading('ID', 'Název', 'Zkratka'); //nastaví záhlaví

foreach ($zeme as $row) { //cyklus pro tabulku, prochází $zemi
    $table->addRow($row->id, anchor('stanice/'.$row->id, $row->name), $row->short_name);
}

echo $table->generate();


/*
--- ArrayList v PHP ---
1) promenna = array(hodnota1 hodnota2, hodnota3); ==> nezávisí na klíči, první je 0, 1, 2, ... ; $pole = array(jirka, peta, mara);
2) promenna = [klic1 => hodnota, klic2 => hodnota] ; $pole = [1 => jirka, 2 => peta];
*/

?>

<?= $this->endSection(); ?>