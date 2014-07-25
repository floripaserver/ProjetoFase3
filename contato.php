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
?>

<section class="content-header">
    <h1>
        Contato
        <small>Pagina de contato</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Contato</li>
    </ol>
</section>

<section class="content">
    <?php
    if ($_POST) {
        
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $assunto = $_POST['assunto'];
        $mensagem = $_POST['mensagem'];
        
        require_once 'Contato/AutoloadContato.php';
        
        $contato = new Contato();
        
        $contato->setNome($nome);
        $contato->setEmail($email);
        $contato->setAssunto($assunto);
        $contato->setMensagem($mensagem);
        
        //echo '<br>teste: '.$contato->getNome();
        
        $resultInsert = $contato->insertContato();
        
        if($resultInsert == 1){
        
        ?>
        <div class="box">
            <div class="box-header">
                <i class="fa fa-archive"></i>

                <h3 class="box-title">Dados enviados com sucesso, abaixo seguem os dados que você enviou:</h3>

            </div>
            <div class="box-body">
                <?php
                echo 'Nome: ' . $contato->getNome();
                echo '<br>Email: ' . $contato->getEmail();
                echo '<br>Assunto: ' . $contato->getAssunto();
                echo '<br>Mensagem: ' . $contato->getMensagem();
                ?>
            </div>  
        </div>
    <?php
        } else{
            echo 'Erro contate o administrador!';
        }
    }
    ?>
    <div class="row">

        <!-- quick email widget -->
        <div class="box">

            <div class="box-header">
                <i class="fa fa-envelope"></i>

                <h3 class="box-title">Email</h3>

            </div>
            <div class="box-body">
                <form action="/contato" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nome" placeholder="Nome:"
                               value="<?php echo $nome; ?>"/>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email:"
                               value="<?php echo $email; ?>"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="assunto" placeholder="Assunto"
                               value="<?php echo $assunto; ?>"/>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="mensagem" placeholder="Mensagem"
                                  style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            <?php echo $mensagem; ?>
                        </textarea>
                    </div>
                    <div class="box-footer clearfix">
                        <button class="pull-right btn btn-default" id="sendEmail">Enviar <i
                                class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>

