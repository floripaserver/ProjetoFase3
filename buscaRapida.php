<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 01/07/14
 * Time: 22:21
 */

require_once 'AutoloadCore.php';

$rotas = new Rotas();

echo $rotas->checkPage();

//require_once 'BuscaRapida/AutoloadBuscaRapida.php';

//$br = new BuscaRapida();

//$result = $br->buscaRapida($rotas->getId());
//echo '<br>post '.$_POST['buscaRapida'];

echo '<br>action .. '.$rotas->getAction();

$result = $rotas->getValue();

echo '<br>id .. '.$result;
?>

<section class="content-header">
    <h1>
        Busca rapida
        <small>Pagina busca rapida</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Busca Rapida</li>
    </ol>
</section>

<section class="content">
    <?php
    
        ?>
        
    <?php
       
    ?>
    <div class="row">

        <!-- quick email widget -->
        <div class="box">

            <div class="box-header">
                <i class="fa fa-envelope"></i>

                <h3 class="box-title">Busca</h3>

            </div>
            <div class="box-body">
                
            </div>
        </div>

    </div>
</section>

