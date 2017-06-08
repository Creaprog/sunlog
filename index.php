<?php
// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
    if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {
        $db = new PDO("mysql:host=localhost;dbname=test;dbname=Sunlog;charset=utf8","root","root");

        // on teste si une entrée de la base contient ce couple login.
        $req = $db->query('SELECT count(*) FROM membre WHERE login="' . htmlentities($_POST['login']) . '" AND pass_md5="' . htmlentities(md5($_POST['pass'])) . '"') or die(print_r($db->errorInfo(), true));

        /* Tableau associatif numérique */
        $data = $req->fetch(PDO::FETCH_ASSOC);
        //var_dump($data["count(*)"]);
        // si on obtient une réponse, alors l'utilisateur est un membre
        if ($data["count(*)"] == 1) {
            session_start();
            $_SESSION['login'] = $_POST['login'];
            header('Location: membre.php');
            exit();
        }
        // si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
        elseif ($data["count(*)"] == 0) {
            echo "<script language='javascript'> alert('L\'utilisateur saisie est invalide. Veuillez-vous inscrire !') </script>";
        }
        // sinon, alors la, il y a un gros problème :)
        else {
            echo "<script language='javascript'> alert('Problème dans la base de donnée : plusieurs membres ont les mêmes identifiants de connexion.') </script>";
        }
    } else {
        echo "<script language='javascript'> alert('Au moins un des champs est vide.') </script>";
    }
}
?>

<?php
if (isset($erreur))
    echo '<br />', $erreur;
?>

<!DOCTYPE HTML>
<html lang = "fr">
    <head>
        <title> Sunlog </title>
        <meta charset = "UTF-8" />
    </head>
    <body>
        <style>
            input[type=text], input[type=password] {
                width: 100%;
                padding : 4px;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }
            h1 {
                border-bottom : 2px red solid;	
                margin-left : 20px;
                margin-right : 100px;
                margin-top : 5px;
                font-size : 25px;
                font-family : Gill Sans;
            }

            img.logo {
                width : 200px;
                margin-left : 600px;
                padding : 5px;
            }

            p {
                text-align : center;
                font-size : 15px;
                font-family : Gill Sans;
            }

            h2 {
                color : white;
                font-family : Gill Sans;
                background-color : red;
                width : 150px;
                padding-top : 30px;
                padding-bottom : 30px;
                padding-right : 250px;
                margin-left : 500px;
                margin-top : 40px;
                margin-bottom : 0px;
                text-align : center;
                border-bottom : grey 5px solid;	
            }

            label.login {
                font-family : Gill Sans;
                font-size : 12px;
                margin-left : 50px;
                width : 200px;
            }

            label.mdp {
                font-family : Gill Sans;
                font-size : 12px;
                margin-left : 36px;
                width : 200px;
            }

            table {
                border-spacing : 10px;
                background-color : whitesmoke;
                width : 400px;
                margin-left : 500px;
                padding : 30px;
            }

            button {
                font-family : Gill Sans;
                background-color : black;
                color : white;
                font-size : 15px;
                cursor : pointer;
                position : relative;
                left : 760px;
                bottom : 27px;
            }
            footer {
                text-align : center;
                margin-top : 210px;
                font-family : Gill Sans;
            }
            div.mdpoublie {
                font-family : Gill Sans;
                text-align : center;
                cursor : pointer;
                left : 585px;
                bottom : 310px;
                text-decoration : underline;
                font-size : 13px;
            }

            div.inscri {
                font-family : Gill Sans;
                font-size : 15px;
                text-align : center;
                cursor : pointer;
                left : 585px;
                bottom : 290px;
            }
            div.free {
                font-family : Gill Sans;
                font-size : 15px;
                text-align : center;
                cursor : pointer;
                left : 585px;
                bottom : 290px;
            }
            div.cli {
                font-family : Gill Sans;
                font-size : 15px;
                text-align : center;
                cursor : pointer;
                left : 585px;
                bottom : 290px;
            }
            a.inscri1 { color : black;}
            a.free1 { color : black;}
            a.cli1 { color : black;}
            html { overflow-x: hidden; } 
            html { overflow-y: hidden; } 
        </style>
        <header>
            <img src = "Sunlog.jpg" class = "logo" width = "500" alt = "Logo" />
            <h1> SUNLOG <br> PORTAIL </h1>
        </header>
        <p> La société Sunlog est disponible <br> du  <FONT color = "red" >lundi au vendredi </FONT> de <FONT color = "red"> 9h à 19h </FONT> (jours ouvrés uniquement). </p>
        <h2> Connexion </h2>
        <form action = "index.php" method = "post">
            <div class = "container">
                <table cellpadding = "0" cellspacing = "0">
                    <tr error = "Le compte utilisateur n'existe pas ou le mot de passe saisi est incorrect !" >
                        <td> <label for = "loginInput" class = "login"> Utilisateur * </label> </td>
                        <td> <input type = "text" name = "login" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>" required /> </td>
                    </tr>
                    <tr> 	
                        <td> <label for = "password" class = "mdp"> Mot de passe * </label> </td>
                        <td> <input type = "password" name = "pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>" required /> </td>
                    </tr>
                </table>
                <button name = "connexion" value = "Connexion" type = "submit" id = "xsubmit"> Se connecter </button>
                <div class = "inscri"> <a href="inscription.php" class = "inscri1"> Voulez-vous inscrire ? Cliquez ici. </a> </div>
                <div class = "free"> <a href="contact.php" class ="free1"> Êtes-vous un freelance ? Envoyez vos CV en cliquant ici. </a> </div>
                <div class = "cli"> <a href="contact1.php" class ="cli1"> Êtes-vous un client ? Envoyez vos demandes en cliquant ici. </a> </div>
            </div>
            <footer>
                SUNLOG France <br> 51 avenue du Maréchal Joffre, 92000 Nanterre <br> 01 83 75 49 59
            </footer>
    </body>
</html>