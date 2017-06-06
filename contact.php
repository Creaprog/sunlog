<html lang = "fr">
    <head>
        <title> Sunlog </title>
        <meta charset = "UTF-8" />
    </head>
    <body>
        <style>
            div.but {
                position : relative;
                top : 270px;
                left : 900px;
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
                width : 250px;
                padding-top : 30px;
                padding-bottom : 30px;
                padding-right : 250px;
                margin-left : 500px;
                margin-top : 40px;
                margin-bottom : 0px;
                text-align : center;
                border-bottom : grey 5px solid;	
            }

            table {
                border-spacing : 10px;
                background-color : whitesmoke;
                width : 500px;
                margin-left : 500px;
                padding : 20px;
                font-family : Gill Sans;
                position : relative;
                bottom : 202px;
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
        <h2> Contact Freelance </h2>
        <form method="post" action="formulaire.php" enctype="multipart/form-data">
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <td> <label for = "nom"> Nom * </label> </td>
                    <td> <input type = "text" name = "nom" id="nom" required /> </td>
                </tr>

                <tr>
                    <td> <label for = "nom"> Prénom * </label> </td>
                    <td> <input type = "text" name = "nom" id="nom" required /> </td>
                </tr>

                <tr>
                    <td> <label for = "nom"> E-mail * </label> </td>
                    <td> <input type = "text" name = "nom" id="nom" required /> </td>
                </tr>
                <tr>
                    <td> <label for = "monfichier"> Pièces-jointes * </label> </td>
                    <td> <input type = "file" name = "monfichier" id="nom" required /> </td>
                </tr>
                <tr>
                    <td> <label for = "demande"> Message * </label> </td>
                    <td> <textarea name="demande" id="demande" cols="40" rows="4" required /></textarea> </td>
                </tr>
                <div class ="but">
                    <input type="submit" value="Envoyer" id="bouton" />
                </div>
        </form>
        <footer>
            SUNLOG France <br> 51 avenue du Maréchal Joffre, 92000 Nanterre <br> 01 83 75 49 59
        </footer>
    </body>
</html>