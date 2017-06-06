<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}
?>
<?php
$base = mysql_connect('localhost', 'root', '');
mysql_select_db('Sunlog', $base);
?>
<html>
    <head>
        <title>Sunlog</title>
        <meta charset="UTF-8">
    </head>
    <header>
        <img src = "Sunlog.jpg" class = "logo" width = "500" alt = "Logo" />
        <h1> SUNLOG <br> PORTAIL </h1>
    </header>
    <body>
        <form action = "index.php" method = "post">
            <div class = "bvn"> 
                <?php
                $blase = mysql_query("SELECT statut,nom,prenom FROM membre WHERE login='" . $_SESSION['login'] . "' ");
                $data = mysql_fetch_assoc($blase);
                ?>
                <FONT COLOR = RED class = "uti"> <?php echo $data['statut']; ?> : </FONT> <?php echo $data['nom'] ?>
                <?php
                echo "";
                echo $data['prenom'];
                ?> <br>
            </div>
            <div class ="dec">
                <button name = "déconnexion" value = "Déconnexion" type = "submit" id = "xsubmit"> Se déconnecter </button>
            </div>
            <ul id ='menu-accordeon'>
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
            </ul>
            <style>
                /* Fond du gadget de la barre de recherche */
                .recherche_p {
                    width:15%;
                    background-color: #eeeeee;   /* Couleur de fond */
                    border-style: solid;   /* Style de la bordure  */
                    border-width: 1px;   /* Epaisseur de la bordure  */
                    border-color: red;   /* Couleur de la bordure  */
                    padding: 10px 10px 10px 10px;   /* Espace entre les bords et le contenu : haut droite bas gauche  */
                }

                /* Champ de saisie */
                #searchthis #search {
                    background-color: #ffffff;   /* Couleur de fond */
                    border-style: solid;   /* Style de la bordure  */
                    border-width: 1px;   /* Epaisseur de la bordure  */
                    border-color: #dddddd;   /* Couleur de la bordure  */
                    padding: 5px 10px 5px 10px;   /* Espace entre les bords et le contenu : haut droite bas gauche  */
                    width: 98.5%;   /* Permet d'ajuster la largeur du champ de saisie à 100% */
                    box-sizing: border-box;   /* Important */
                    font-family: Lato;   /* Police du texte */
                    font-size: 12px;   /* Taille de la police du texte */
                    font-weight: normal;   /* Graisse du texte : normal = normal ; bold = gras */
                    letter-spacing: 1px;   /* Espacement des caractères */
                }

                /* Bouton valider */
                #searchthis #search-btn {
                    background-color: red;   /* Couleur de fond */
                    border-style: solid;   /* Style de la bordure  */
                    border-width: 1px;   /* Epaisseur de la bordure  */
                    border-color: #E8B960;   /* Couleur de la bordure  */
                    padding: 5px 10px 5px 10px;   /* Espace entre les bords et le contenu : haut droite bas gauche  */
                    width: 98.5%;   /* Permet d'ajuster la largeur du champ de saisie à 100% */
                    box-sizing: border-box;   /* Important */
                    font-family: PT sans;   /* Police du texte */
                    font-size: 13px;   /* Taille de la police du texte */
                    font-weight: normal;   /* Graisse du texte : normal = normal ; bold = gras */
                    letter-spacing: 2px;   /* Espacement des caractères */
                    margin: 10px 0 0 0;   /* Espace autour du bouton : haut droite bas gauche  */
                    text-transform: uppercase;   /* Transforme le texte en majuscules */
                    color: #ffffff;   /* Couleur du texte */
                }

                /* Bouton valider quand survolé par la souris */
                #searchthis #search-btn:hover {
                    background-color: #ffffff;   /* Couleur de fond */
                    color: #E8B960;   /* Couleur du texte */
                    cursor: pointer;   /* Apparence du curseur comme pour un lien */
                }
                #menu-accordeon {
                    padding:0;
                    margin:20px;
                    list-style:none;
                    text-align: center;
                    width: 190px;
                    font-family : Gill Sans;
                    float : left;
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
                html { overflow-x: hidden; } 
                div.dec {
                    font-family : Gill Sans;
                    color : white;
                    font-size : 15px;
                    cursor : pointer;
                    position : relative;
                    top : -16px;
                    left : 450px;
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
                img.logo {
                    width : 200px;
                    margin-left : 600px;
                    padding : 5px;
                }
                h1 {
                    border-bottom : 2px red solid;	
                    margin-left : 20px;
                    margin-right : 100px;
                    margin-top : 5px;
                    font-size : 25px;
                    font-family : Gill Sans;
                }
                /* Classe obligatoire pour les flèches */
                .flecheDesc {
                    width: 0; 
                    height: 0; 
                    float:right;
                    margin: 10px;
                    border-left: 5px solid transparent;
                    border-right: 5px solid transparent;
                    border-bottom: 5px solid black;
                }
                .flecheAsc {
                    width: 0; 
                    height: 0;
                    float:right;
                    margin: 10px;
                    border-left: 5px solid transparent;
                    border-right: 5px solid transparent;
                    border-top: 5px solid black;
                }

                /* Classe optionnelle pour le style */
                .tableau {width:82%;table-layout: fixed;border-collapse: collapse;margin : 0 auto;text-align : center;font-size:10px;}
                .tableau td {padding:.3rem}
                .zebre tbody tr:nth-child(odd) {background-color: #d6d3ce;border-bottom:1px solid #ccc;color:#444;}
                .zebre tbody tr:nth-child(even) {background-color: #c6c3bd;border-bottom:1px solid #ccc;color:#444;}
                .zebre tbody tr:hover:nth-child(odd) {background-color: #999690;color:#ffffff;}
                .zebre tbody tr:hover:nth-child(even) {background-color: #999690;color:#ffffff;}
                .avectri th {text-align:center;padding:5px 0 0 5px;vertical-align: middle;background-color:#999690;color:#444;cursor:pointer;
                             -webkit-touch-callout: none;
                             -webkit-user-select: none;
                             -khtml-user-select: none;
                             -moz-user-select: none;
                             -ms-user-select: none;
                             -o-user-select: none;
                             user-select: none;
                }
                .avectri th.selection {background-color:#5d625c;color:#fff;}
                .avectri th.selection .flecheDesc {border-bottom-color: white;}
                .avectri th.selection .flecheAsc {border-top-color: white;}
                .zebre tbody td:nth-child(3) {text-align:center;}
            </style>
            <div class ="tabl">
                <?php
                $reponse = mysql_query("SELECT * FROM profil WHERE dispo >= NOW()");
                ?>
            </div>
                <table class="tableau zebre avectri">
                    <thead>
                        <tr>
                            <th>Rang</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Compétences</th>
                            <th>Niveau d'anglais</th>
                            <th>Tarif</th>
                            <th>Téléphone</th>
                            <th>E-mail</th>
                            <th>Adresse</th>
                            <th data-type="date">Disponibilité</th>
                            <th data-type="date">Création du profil</th>
                        </tr>
                    </thead>
                    <?php
                    while ($donnees = mysql_fetch_array($reponse)) {
                        ?>
                        <tr>
                            <th><?php echo $donnees['id_profil']; ?></th>
                            <th><?php echo $donnees['nom']; ?></th>
                            <th><?php echo $donnees['prenom']; ?></th>
                            <th><?php echo $donnees['competence']; ?></th>
                            <th><?php echo $donnees['niv_anglais']; ?></th>
                            <th><?php echo $donnees['tarif']; ?></th>
                            <th><?php echo $donnees['tel']; ?></th>
                            <th><?php echo $donnees['email']; ?></th>
                            <th><?php echo $donnees['adresse']; ?></th>
                            <th><?php echo $donnees['dispo']; ?></th>
                            <th><?php echo $donnees['creation']; ?></th>
                        </tr>
                        <?php
                    }
                    mysql_close();
                    ?>
                </table>
            </form>
            <script>
                // Tri dynamique de tableau HTML
                // Auteur : Copyright © 2015 - Django Blais
                // Source : http://trucsweb.com/tutoriels/Javascript/tableau-tri/
                // Sous licence du MIT.
                function twInitTableau() {
                    // Initialise chaque tableau de classe « avectri »
                    [].forEach.call(document.getElementsByClassName("avectri"), function (oTableau) {
                        var oEntete = oTableau.getElementsByTagName("tr")[0];
                        var nI = 1;
                        // Ajoute à chaque entête (th) la capture du clic
                        // Un picto flèche, et deux variable data-*
                        // - Le sens du tri (0 ou 1)
                        // - Le numéro de la colonne
                        [].forEach.call(oEntete.querySelectorAll("th"), function (oTh) {
                            oTh.addEventListener("click", twTriTableau, false);
                            oTh.setAttribute("data-pos", nI);
                            if (oTh.getAttribute("data-tri") == "1") {
                                oTh.innerHTML += "<span class=\"flecheDesc\"></span>";
                            } else {
                                oTh.setAttribute("data-tri", "0");
                                oTh.innerHTML += "<span class=\"flecheAsc\"></span>";
                            }
                            // Tri par défaut
                            if (oTh.className == "selection") {
                                oTh.click();
                            }
                            nI++;
                        });
                    });
                }

                function twInit() {
                    twInitTableau();
                }
                function twPret(maFonction) {
                    if (document.readyState != "loading") {
                        maFonction();
                    } else {
                        document.addEventListener("DOMContentLoaded", maFonction);
                    }
                }
                twPret(twInit);

                function twTriTableau() {
                    // Ajuste le tri
                    var nBoolDir = this.getAttribute("data-tri");
                    this.setAttribute("data-tri", (nBoolDir == "0") ? "1" : "0");
                    // Supprime la classe « selection » de chaque colonne.
                    [].forEach.call(this.parentNode.querySelectorAll("th"), function (oTh) {
                        oTh.classList.remove("selection");
                    });
                    // Ajoute la classe « selection » à la colonne cliquée.
                    this.className = "selection";
                    // Ajuste la flèche
                    this.querySelector("span").className = (nBoolDir == "0") ? "flecheAsc" : "flecheDesc";

                    // Construit la matrice
                    // Récupère le tableau (tbody)
                    var oTbody = this.parentNode.parentNode.parentNode.getElementsByTagName("tbody")[0];
                    var oLigne = oTbody.rows;
                    var nNbrLigne = oLigne.length;
                    var aColonne = new Array(), i, j, oCel;
                    for (i = 0; i < nNbrLigne; i++) {
                        oCel = oLigne[i].cells;
                        aColonne[i] = new Array();
                        for (j = 0; j < oCel.length; j++) {
                            aColonne[i][j] = oCel[j].innerHTML;
                        }
                    }

                    // Trier la matrice (array)
                    // Récupère le numéro de la colonne
                    var nIndex = this.getAttribute("data-pos");
                    // Récupère le type de tri (numérique ou par défaut « local »)
                    var sFonctionTri = (this.getAttribute("data-type") == "num") ? "compareNombres" : "compareLocale";
                    // Tri
                    aColonne.sort(eval(sFonctionTri));
                    // Tri numérique
                    function compareNombres(a, b) {
                        return a[nIndex - 1] - b[nIndex - 1];
                    }
                    // Tri local (pour support utf-8)
                    function compareLocale(a, b) {
                        return a[nIndex - 1].localeCompare(b[nIndex - 1]);
                    }
                    // Renverse la matrice dans le cas d’un tri descendant
                    if (nBoolDir == 0)
                        aColonne.reverse();

                    // Construit les colonne du nouveau tableau
                    for (i = 0; i < nNbrLigne; i++) {
                        aColonne[i] = "<td>" + aColonne[i].join("</td><td>") + "</td>";
                    }

                    // assigne les lignes au tableau
                    oTbody.innerHTML = "<tr>" + aColonne.join("</tr><tr>") + "</tr>";
                }
            </script>
    </body>
</html>
