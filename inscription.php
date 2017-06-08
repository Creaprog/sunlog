<?php
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
    // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
    if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
        // on teste les deux mots de passe
        if ($_POST['pass'] != $_POST['pass_confirm']) {
            echo "<script language='javascript'> alert('Les mots de passe ne correspondent pas.') </script>";
        } else {
            $base = mysql_connect('localhost', 'root', 'root');
            mysql_select_db('Sunlog', $base);

            // on recherche si ce login est déjà utilisé par un autre membre
            $sql = 'SELECT count(*) FROM membre WHERE login="' . mysql_escape_string($_POST['login']) . '"';
            $req = mysql_query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
            $data = mysql_fetch_array($req);

            if ($data[0] == 0) {
                $sql = 'INSERT INTO membre (statut,nom,prenom,login,pass_md5) VALUES("' . mysql_escape_string(($_POST['statut'])) . '","' . mysql_escape_string(($_POST['nom'])) . '", "' . mysql_escape_string(($_POST['prenom'])) . '","' . mysql_escape_string(($_POST['login'])) . '", "' . mysql_escape_string(md5($_POST['pass'])) . '")';
                mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());

                session_start();
                $_SESSION['login'] = $_POST['login'];
                header('Location: membre.php');
                exit();
            } else {
                echo "<script language='javascript'> alert('Ce login n\'est pas disponible.') </script>";
            }
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

</body>
</html>

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

            label.statut {
                font-family : Gill Sans;
                font-size : 12px;
                margin-left : 103.9px;
                width : 200px;
            }

            label.login {
                font-family : Gill Sans;
                font-size : 12px;
                margin-left : 82px;
                width : 200px;
            }

            label.name {
                font-family : Gill Sans;
                font-size : 12px;
                margin-left : 108px;
                width : 200px;
            }

            label.firstname {
                font-family : Gill Sans;
                font-size : 12px;
                margin-left : 96px;
                width : 200px;
            }

            label.mdp {
                font-family : Gill Sans;
                font-size : 12px;
                margin-left : 70px;
                width : 200px;
            }

            label.mdp2 {
                font-family : Gill Sans;
                font-size : 12px;
                margin-left : -13px;
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
                left : 775px;
                bottom : 27px;
            }

            footer {
                text-align : center;
                margin-top : 127px;
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

            #menudérou {
                position: relative;
                left: 695px;
                top: 58px;
                width: 320px;
                margin-top : -19px;
            }

            div.inscri {
                font-family : Gill Sans;
                font-size : 13px;
                text-align : center;
                cursor : pointer;
                left : 585px;
                bottom : 290px;
            }
            a.inscri1 { color : black;}
            html { overflow-x: hidden; } 
            html { overflow-y: hidden; }
        </style>
        <header>
            <img src = "Sunlog.jpg" class = "logo" width = "500" alt = "Logo" />
            <h1> SUNLOG <br> PORTAIL </h1>
        </header>
        <p> La société Sunlog est disponible <br> du  <FONT color = "red" >lundi au vendredi </FONT> de <FONT color = "red"> 9h à 19h </FONT> (jours ouvrés uniquement). </p>
        <h2> Inscription </h2>
        <form action = "inscription.php" method = "post">
            <div class = "container">
                <table cellpadding = "0" cellspacing = "0">
                    <tr>
                        <td> <label for = "statut" class = "statut"> Statut * </label> </td>
                    <div id = "menudérou">
                        <SELECT name = "statut" id = "statut" value="<?php if (isset($_POST['statut'])) echo htmlentities(trim($_POST['statut'])); ?>" required />
                        <OPTION> Client </OPTION>
                        <OPTION> Freelance </OPTION>
                        <OPTION> Société de service </OPTION>
                        </SELECT>
                    </div>
                    </tr>
                    <tr error = "Le compte utilisateur n'existe pas ou le mot de passe saisi est incorrect !" >
                        <td> <label for = "loginInput" class = "login"> Utilisateur * </label> </td>
                        <td> <input type = "text" name = "login" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>" required /> </td>
                    </tr>
                    <tr>
                        <td> <label for = "loginInput" class = "name"> Nom * </label> </td>
                        <td> <input type = "text" name = "nom" value="<?php if (isset($_POST['nom'])) echo htmlentities(trim($_POST['nom'])); ?>" required /> </td>
                    </tr>
                    <tr>
                        <td> <label for = "loginInput" class = "firstname"> Prénom * </label> </td>
                        <td> <input type = "text" name = "prenom" value="<?php if (isset($_POST['prenom'])) echo htmlentities(trim($_POST['prenom'])); ?>" required /> </td>
                    </tr>
                    <tr> 	
                        <td> <label for = "password" class = "mdp"> Mot de passe * </label> </td>
                        <td> <input type = "password" name = "pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>" required /> </td>
                    </tr>
                    <tr>
                        <td> <label for = "passwordagain" class ="mdp2"> Confirmation du mot de passe * </label> </td>
                        <td> <input type = "password" name = "pass_confirm" value ="<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>" required /> <td>
                    </tr>
                </table>
                <button name = "inscription" value = "Inscription" type = "submit" id = "xsubmit"> S'inscrire </button>
            </div>
        </form>
        <footer>
            SUNLOG France <br> 51 avenue du Maréchal Joffre, 92000 Nanterre <br> 01 83 75 49 59
        </footer>
    </body>
</html>