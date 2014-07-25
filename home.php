<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 01/07/14
 * Time: 21:41
 */
require_once 'AutoloadCore.php';

$rotas = new Rotas();

echo $rotas->checkPage();
?>
<section class="content-header">
    <h1>
        Home
        <small>Pagina inicial</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Home</li>
    </ol>
</section>

<section class="content">

    <div class="row">
        <section class="col-lg-6 connectedSortable">
            <p>Floripa Server.</p>
            <p>Provedor de internet a radio.</p>
        </section>
        <section class="col-lg-6 connectedSortable">
            <p>SoftEmp.</p>
            <p>Software para gerencimento de empresas.</p>
        </section>
    </div>

</section>
