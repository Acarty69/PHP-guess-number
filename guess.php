<?php 
session_start();
if (empty($_SESSION['alea']))
{

$_SESSION['alea']=rand(0,20);

}
if (empty($_SESSION['essaie']))
{

$_SESSION['essaie']=5;

}




?>

<html>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form name="guess" action="guess.php" method="get">
            <label for="action-guess">Chiffre entre 0 et 20</label>
            <input name="action-guess" type="number" min="0" max="20">
            
        </form>
        <?php
        

        if (isset( $_GET['action-guess']))
        {
        if ($_GET['action-guess'] ==  $_SESSION['alea']){
            echo "bien vue";
            $_SESSION['essaie']--;

            if ($_SESSION['essaie']==0){
                echo "c'est perdu";
                session_destroy();
            }
        }
            elseif ($_GET['action-guess'] < $_SESSION['alea']){
                echo "c'est +";
                $_SESSION['essaie']--;

                if ($_SESSION['essaie']==0){
                    echo "c'est perdu";
                    session_destroy();
                }
            }
            elseif ($_GET['action-guess'] > $_SESSION['alea']) {
                echo "C'est moins";
                $_SESSION['essaie']--;

                if ($_SESSION['essaie']==0){
                    echo "c'est perdu";
                    session_destroy();
                }
            }
            
        }
        else{
            echo "met un chiffre";}
        
        session_destroy();
        ?>
    </body>
    </html>
</html>