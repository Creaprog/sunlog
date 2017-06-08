<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}
?>

<?php
$db = new PDO("mysql:host=localhost;dbname=test;dbname=Sunlog;charset=utf8","root","root");
?>
<html>
    <head>
        <title>Sunlog</title>
        <meta charset="UTF-8" />
    </head>

    <style>
        div.dec {
            font-family : Gill Sans;
            color : white;
            font-size : 15px;
            cursor : pointer;
            position : relative;
            top : -38px;
            left : 450px;
        }
        div.bvn {
            font-family : Gill Sans;
            font-size : 18px;
            text-align : justify;
            position : relative;
            bottom : 100px;
            left : 1080px;
            border : red 3px solid;
            width : 325px;
        }
        #menu-accordeon {
            padding:0;
            margin:20px;
            list-style:none;
            text-align: center;
            width: 190px;
            font-family : Gill Sans;
        }
        #menu-accordeon ul {
            padding:0;
            margin:0;
            list-style:none;
            text-align: center;
        }
        #menu-accordeon li {
            background-color:#729EBF;
            background-image:-webkit-linear-gradient(top, #729EBF 0%, #333A40 100%);
            background-image: linear-gradient(to bottom, #729EBF 0%, #333A40 100%);
            border-radius: 6px;
            margin-bottom:2px;
            box-shadow: 3px 3px 3px #999;
            border:solid 1px #333A40
        }
        #menu-accordeon li li {
            max-height:0;
            overflow: hidden;
            transition: all .5s;
            border-radius:0;
            background: #444;
            box-shadow: none;
            border:none;
            margin:0
        }
        #menu-accordeon a {
            display:block;
            text-decoration: none;
            padding: 8px 0;
            font-family : Gill Sans;
            font-size:1.2em;
            color : #fff;
        }
        #menu-accordeon ul li a, #menu-accordeon li:hover li a {
            font-size:1em
        }
        #menu-accordeon li:hover {
            background: #729EBF;
        }
        #menu-accordeon li li:hover {
            background: grey;
        }
        #menu-accordeon ul li:last-child {
            border-radius: 0 0 6px 6px;
            border:none;
        }
        #menu-accordeon li:hover li {
            max-height: 15em;
        }
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
            bottom : 51px;
        }

        footer {
            text-align : center;
            margin-top : 230px;
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
    <body>
        <form action = "index.php" method = "post">
            <div class = "bvn">
                <?php
                $blase = $db->query("SELECT statut,nom,prenom FROM membre WHERE login='" . $_SESSION['login'] . "' ");
                $data = $blase->fetch(PDO::FETCH_ASSOC);
                ?>
                <FONT COLOR = RED class = "uti"> <?php echo $data['statut']; ?> : </FONT> <?php echo $data['nom'] ?>
                <?php
                echo $data['prenom'];
                ?> <br>
                <?php
                $temps = date('Y-m-d H:i:s');
                //mysql_query("UPDATE membre SET last_login = '" . $temps . "' WHERE login='" . $_SESSION['login'] . "' ") or die(mysql_error());
                ?> <FONT COLOR = RED> Connexion :  </FONT>
                <?php echo date('d-m-Y H:i:s');
                ?>
            </div>
            <div class ="dec">
                <button name = "déconnexion" value = "Déconnexion" type = "submit" id = "xsubmit"> Se déconnecter </button>
            </div>
        </form>
        <?php
        if ($data['statut'] == "Administrateur") {
            echo "<ul id ='menu-accordeon'>
                <li><a href = '#'>MES CV</a>
                    <ul>
                        <li><a href = 'admin-profil_dispo.php'>Profils disponibles</a></li>
                        <li><a href = 'admin-profil_indispo.php'>Profils indisponibles</a></li>
                        <li><a href = 'admin-tout_afficher.php'>Tout afficher</a></li>
                    </ul>
                <li><a href = '#'>MES DEMANDES</a>
                    <ul>
                        <li><a href = '#'>Prises en charge</a></li>
                        <li><a href = '#'>Non traitées</a></li>
                        <li><a href = '#'>Tout afficher</a></li>
                    </ul>
                </li>
                <li><a href = '#'>CV PUBLIC</a>
                    <ul>
                        <li><a href = '#'>Mes profils en mode publique</a></li>
                        <li><a href = '#'>Les profils publiques</a></li>
                        <li><a href = '#'>Tout afficher</a></li>
                    </ul>
                </li>
                <li><a href = '#'>DEMANDE PUBLIQUE</a>
                    <ul>
                        <li><a href = '#'>En mode publique</a></li>
                        <li><a href = '#'>Publique</a></li>
                        <li><a href = '#'>Tout afficher</a></li>
                    </ul>
                </li>
                <li><a href = '#'>COMMERCIAUX</a>
                    <ul>
                        <li><a href = '#'>KOUATI Mehdi</a></li>
                        <li><a href = '#'>CHEKOURY David</a></li>
                    </ul>
                </li>
            </ul>";
        }
        ?>
        <?php
        if ($data['statut'] == "Freelance") {
            echo "<ul id ='menu-accordeon'>
                <li><a href = '#'>DEMANDE PUBLIQUE</a>
                    <ul>
                        <li><a href = '#'>Publique</a></li>
                    </ul>
                </li>
            </ul>";
        }
        ?>
        <?php
        if (($data['statut'] == "Client") || ($data['statut'] == "Société de service")) {
            echo "<ul id ='menu-accordeon'>
                <li><a href = '#'>CV PUBLIC</a>
                    <ul>
                        <li><a href = '#'>Les profils publiques</a></li>
                    </ul>
                </li>
                <li><a href = '#'>DEMANDE PUBLIQUE</a>
                    <ul>
                        <li><a href = '#'>Publique</a></li>
                    </ul>
                </li>
            </ul>";
        }
        ?>
        <?php
        if ($data['statut'] == "Commercial") {
            echo "<ul id ='menu-accordeon'>
                <li><a href = '#'>MES CV</a>
                    <ul>
                        <li><a href = '#'>Profils disponibles</a></li>
                        <li><a href = '#'>Profils indisponibles</a></li>
                        <li><a href = '#'>Tout afficher</a></li>
                    </ul>
                <li><a href = '#'>MES DEMANDES</a>
                    <ul>
                        <li><a href = '#'>Prises en charge</a></li>
                        <li><a href = '#'>Non traitées</a></li>
                        <li><a href = '#'>Tout afficher</a></li>
                    </ul>
                </li>
                <li><a href = '#'>CV PUBLIC</a>
                    <ul>
                        <li><a href = '#'>Mes profils en mode publique</a></li>
                        <li><a href = '#'>Les profils publiques</a></li>
                        <li><a href = '#'>Tout afficher</a></li>
                    </ul>
                </li>
                <li><a href = '#'>DEMANDE PUBLIQUE</a>
                    <ul>
                        <li><a href = '#'>En mode publique</a></li>
                        <li><a href = '#'>Publique</a></li>
                        <li><a href = '#'>Tout afficher</a></li>
                    </ul>
                </li>
            </ul>";
        }
        ?>
    </body>
</html>