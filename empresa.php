<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 06/07/14
 * Time: 17:19
 */
require_once 'AutoloadCore.php';

$rotas = new rotas();

echo $rotas->checkPage();

require_once 'QuemSomos/AutoloadQuemSomos.php';

$arrayQuemSomos = QuemSomos::getQuemSomos();

?>

<section class="content-header">
    <h1>
        Empresa
        <small>Pagina empresa</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Empresa</li>
    </ol>
</section>

<section class="content">

    <div class="row">

        <div class="box">

            <div class="box-header">
                <i class="fa fa-archive"></i>

                <h3 class="box-title"><?php echo $arrayQuemSomos[0]['titulo_quem_somos']; ?></h3>

            </div>
            <div class="box-body">
                <?php echo $arrayQuemSomos[0]['descricao_quem_somos']; ?>
            </div>
        </div>

    </div>
</section>