<?php require_once "./cdn/resorces.php" ?>
<?php require_once './libs/libsphp/BBcode/bbcode.php'; ?>
<?php
/**
* @author Gilberto Ramos de O. <gilberto.tec@vivaldi.net>
* @version 1.0 
* @copyright  unlicense <http://unlicense.org/>
*/ 
?>
<?php
try{
     $con = conect();
    $entrevistas= getEntrevistas($con);
    
} catch (Exception $e){
    $msgAlertaErro = " Erro Catastrofico no Sistema!!!" . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <title>A sua celebridade está aqui</title>
        <meta name="keywords" content="BugBunnySA, Celebridades,show,shows,atores,filmes"><!-- Definindo palavras chaves para motores de busca -->
        <meta name="description" content="Pagina referente a matérias sobre os atores nacionais que são capas de revistas ou filmes do mês">
        <meta name="abstract" content="Matérias sobre Famosos">
        <meta	name="revisit-after" content="7 days">
        <link rel="stylesheet" href="./fonts/awesome/all.css">
        <?php include_once './head.php'; ?>
    </head>
    <body>
        <header>
            <div class="ItemCaixaHeader">
                <nav aria-label="main navigation" data-display='block'>
                    <div class="CaixaMenu" role="menu">
                        <div class="ItemMenu BordaDireita"  role="menuitem"><a href="./index.php">Home</a></div>
                        <div class="ItemMenu BordaDireita"  role="menuitem"><a href="./news.php">Notícias</a></div>
                        <div class="ItemMenu BordaDireita"  role="menuitem"><a href="./about.php">Sobre</a></div>
                        <div class="ItemMenu BordaDireita"  role="menuitem"><a href="./offers.php">Promoções</a></div>
                        <div class="ItemMenu BordaDireita"  role="menuitem"><a href="./celebrities.php">Celebridades</a></div>
                        <div class="ItemMenu BordaDireita"  role="menuitem"><a href="./stalls.php">Nossas Bancas</a></div>
                        <div class="ItemMenu"   role="menuitem"><a href="contact.php">Fale Conosco</a></div>
                    </div>                    
                </nav>
            </div>
            <div class="ItemCaixaHeader">
                <div class="Logo">
                    <img alt=" Logo do site" title="logo" height="32" width="32" src="img/logo2.png">
                    <p>BugBunny</p>
                </div>
            </div>
        </header>
        <div role="banner">
            <div class="CaixaRedesSociais">
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-facebook-f"></i>
            </div>
            <link rel="stylesheet" href="libs/Blink-Slider/blink.css">
            <div id="CaixaSlider">
                <section class="blink-slider">            
                    <button id="prev" aria-label="voltar Imagem"><i class="far fa-arrow-alt-circle-left"></i></button>
                    <button id="next" aria-label="proxima Imagem"><i class="far fa-arrow-alt-circle-right"></i></button>
                    <div class="blink-view" id="blink" aria-live="polite" aria-relevant="all">
                        <?php for($i =1;$i < count($entrevistas);$i++){ ?>

                            <?php if($entrevistas[$i]->img !== null and $entrevistas[$i]->img !==""){?>
                                <div class="viewSlide">
                                    <div class="ItemSlider" style="background-repeat: no-repeat; background-size: cover; height: 500px; background-image: url(imgup/<?=@$entrevistas[$i]->img?>);">
                                    </div>
                                </div>
                            <?php }?>
                        
                        <?php } ?>
                        <div class="viewSlide">
                            <div class="ItemSlider" style="background-repeat: no-repeat; background-size: cover;  height: 500px;  background-image:url(img/celebridades/Capturadetela_2018-08-29_12-41-50.png);">

                            </div>
                        </div>

                        <div class="viewSlide">
                            <div class="ItemSlider" style="background-repeat: no-repeat; background-size: cover;  height: 500px;  background-image:url(img/celebridades/Capturadetela_2018-08-29_12-39-42.png);">

                            </div>
                        </div>
                    </div>
                    <div class="blink-control" id="blink-control">
                    </div>
                    <script src="./libs/Blink-Slider/jquery.blink.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#blink").blink();
                        });
                    </script>
                </section>
            </div>
        </div>
        <div id="main" role="main" class="arredonda">
            <section aria-label="Entrevistas da BugBunny">
                <h1>Entrevistas</h1>
                <?php for($i =1;$i < count($entrevistas);$i++){?>
                <article tabindex="0">
                    <h2><?=$entrevistas[$i]->titulo?></h2>
                    <div class="CaixaTexto"> 
                        <?=BBcode($entrevistas[$i]->conteudo) ?>
                        <button class="Direita" data-url="<?=$entrevistas[$i]->url?>">Ver Mais+</button>
                    </div>
                </article>
                <?php } ?>
                
            </section>
        </div>
        <footer>
            <p>Copyright© Senai 2018</p>
        </footer>
        <script>
            $(function () {
                $("#main").slideUp(1).slideDown(200);
            });
            if(window.innerWidth<958){
                $('nav[aria-label^="main"]').click(function(){
                    $(this).find('.CaixaMenu').css('display',$(this).attr('data-display'))
                    if(($(this).attr('data-display')+'').search('block')>=0){
                        $(this).attr('data-display','none');
                    }else{
                        $(this).attr('data-display','block');
                    }
                })
            }
        </script>
    </body>
</html>
