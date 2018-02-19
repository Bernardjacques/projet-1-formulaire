<?php
ini_set('display_errors','on');
error_reporting(E_ALL);

$options=array(
       'prenom' => FILTER_SANITIZE_STRING,
       'nom' => FILTER_SANITIZE_STRING,
       'email' => FILTER_VALIDATE_EMAIL,
       'message' => FILTER_SANITIZE_STRING,
       'pays' => FILTER_SANITIZE_STRING,
       'genre' => FILTER_SANITIZE_STRING,
       'sujet' => FILTER_SANITIZE_STRING);

$result = filter_input_array(INPUT_POST, $options);
$prenomErr = $nomErr = $genreErr = $emailErr = $paysErr  = $messageErr = $sujetErr = "";
     $prenom = $nom = $genre = $email = $pays =  $message = $sujet = "";
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if (empty($_POST["nom"])) 
       {
       $nomErr = "Veuillez indiquer votre nom. ";
       } else 
       {
       $nom = test_input($_POST["nom"]);
       if (!preg_match("/^[-a-zA-ZÜ-ü]*$/",$nom)) 
       {
         $nomErr = "Merci d'indiquer correctement votre nom.";
       }
       }

     if (empty($_POST["prenom"])) 
     {
     $prenomErr = "Veuillez indiquer votre prénom. ";
     } else {
     $prenom = test_input($_POST["prenom"]);
     if (!preg_match("/^[-a-zA-Zéèàêçëïö]*$/", $prenom)) 
     {
       $prenomErr = "Veuillez indiquer correctement votre prénom. ";
     }
     }

     if (empty($_POST["genre"])) 
     {
     $genreErr = "Veuillez indiquer votre genre. ";
     } else 
     {
     $genre = test_input($_POST["genre"]);
     }

     if (empty($_POST["email"])) 
     {
     $emailErr = "Veuillez indiquer votre adresse mail. ";
     } else {
     $email = test_input($_POST["email"]);
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
     {
       $emailErr = "Veuillez respecter le format mail (exemple@mail.com), merci.";
     }
     }

     if (empty($_POST["message"])) 
     {
     $messageErr = "Veuillez entrer votre message";
     } else {
     $message = test_input($_POST["message"]);
     }

     if (empty($_POST["sujet"])) 
     {
     $sujetErr = "Veuillez choisir un sujet.";
     } else {
     $sujet = test_input($_POST["sujet"]);
     }

     }

     if (isset($_POST['submit'])) 
     {

       $to = "bernardjacques789@gmail.com";
       $subject = $_POST['sujet'];
       $message = "Nom: ".$_POST['nom']."\r\n";
       $message .= "Prénom: ".$_POST['prenom']."\r\n";
       $message .= "Pays: ".$_POST['pays']."\r\n";
       $message .= 'E-mail: '.$_POST['email']."\r\n";
       $message .= "Genre: ".$_POST['genre']."\r\n";
       $message .= "Message: \r\n\r\n\r\n" .$_POST['message']."\r\n\r\n--\r\n\r\n";
       $headers = 'From: client@example.com' . "\r\n" .
       'Reply-To: client@example.com' . "\r\n" .
       'X-Mailer: PHP/' . phpversion();
       
       mail($to, $subject, $message, $headers);
     }

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">

    <title>Contacter Hackers Poulette</title>
</head>
<body>
      <header>
        <img src="hackers-poulette-logo2.png" alt="logo de Hackers Poulettes"/>
        <p>Bienvenue sur le formulaire de contact de Hackers Poulettes©, votre
           fournisseur de kits et accessoires pour Rasperri Pi, les nano-ordinateurs
           à monter soi-même ! <br>
           Contactez-nous pour un problème de matériel, une pièce manquante, de l'aide
           dans votre montage ou tout autre sujet en rapport avec nous.<br>
           Nous vous répondrons dans les plus brefs délais !
        </p>
      </header>
      <section class="formulaire">
        <div>
            <h1>Formulaire de contact</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="floatleft">
                Nom<span class="astespan">*</span> : <span class="error"><?php echo $nomErr; ?></span><input class="name" type="text" name="nom" placeholder="Votre nom" >
                Prénom<span class="astespan">*</span> : <span class="error"><?php echo $prenomErr; ?></span><input class="name" type="text" name="prenom" placeholder="Votre prénom" >
                Email<span class="astespan">*</span> :
                <span class="error"><?php echo $emailErr; ?></span><input class="mail" type="email" name="email" placeholder="Votre e-mail" >
            </div>
            <div class="floatright">
                Genre<span class="astespan">*</span> :
                <span class="error"><?php echo $genreErr; ?></span><select name="genre">
                  <option value="">- Sélectionnez -</option>
                  <option value="Femme">Femme</option>
                  <option value="Homme">Homme</option>
                  <option value="Autre">Autre</option>
                </select>
                <div class="categories">
                    Pays<span class="astespan">*</span> :
                  <span class="error"><?php echo $paysErr; ?></span><select name="pays" >
                            <option value="Belgique" selected="selected">Belgique </option>

                            <option value="Afghanistan">Afghanistan </option>
                            <option value="Afrique_Centrale">Afrique_Centrale </option>
                            <option value="Afrique_du_sud">Afrique_du_Sud </option>
                            <option value="Albanie">Albanie </option>
                            <option value="Algerie">Algerie </option>
                            <option value="Allemagne">Allemagne </option>
                            <option value="Andorre">Andorre </option>
                            <option value="Angola">Angola </option>
                            <option value="Anguilla">Anguilla </option>
                            <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                            <option value="Argentine">Argentine </option>
                            <option value="Armenie">Armenie </option>
                            <option value="Australie">Australie </option>
                            <option value="Autriche">Autriche </option>
                            <option value="Azerbaidjan">Azerbaidjan </option>

                            <option value="Bahamas">Bahamas </option>
                            <option value="Bangladesh">Bangladesh </option>
                            <option value="Barbade">Barbade </option>
                            <option value="Bahrein">Bahrein </option>
                            <option value="Belgique">Belgique </option>
                            <option value="Belize">Belize </option>
                            <option value="Benin">Benin </option>
                            <option value="Bermudes">Bermudes </option>
                            <option value="Bielorussie">Bielorussie </option>
                            <option value="Bolivie">Bolivie </option>
                            <option value="Botswana">Botswana </option>
                            <option value="Bhoutan">Bhoutan </option>
                            <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                            <option value="Bresil">Bresil </option>
                            <option value="Brunei">Brunei </option>
                            <option value="Bulgarie">Bulgarie </option>
                            <option value="Burkina_Faso">Burkina_Faso </option>
                            <option value="Burundi">Burundi </option>

                            <option value="Caiman">Caiman </option>
                            <option value="Cambodge">Cambodge </option>
                            <option value="Cameroun">Cameroun </option>
                            <option value="Canada">Canada </option>
                            <option value="Canaries">Canaries </option>
                            <option value="Cap_vert">Cap_Vert </option>
                            <option value="Chili">Chili </option>
                            <option value="Chine">Chine </option>
                            <option value="Chypre">Chypre </option>
                            <option value="Colombie">Colombie </option>
                            <option value="Comores">Colombie </option>
                            <option value="Congo">Congo </option>
                            <option value="Congo_democratique">Congo_democratique </option>
                            <option value="Cook">Cook </option>
                            <option value="Coree_du_Nord">Coree_du_Nord </option>
                            <option value="Coree_du_Sud">Coree_du_Sud </option>
                            <option value="Costa_Rica">Costa_Rica </option>
                            <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                            <option value="Croatie">Croatie </option>
                            <option value="Cuba">Cuba </option>

                            <option value="Danemark">Danemark </option>
                            <option value="Djibouti">Djibouti </option>
                            <option value="Dominique">Dominique </option>

                            <option value="Egypte">Egypte </option>
                            <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                            <option value="Equateur">Equateur </option>
                            <option value="Erythree">Erythree </option>
                            <option value="Espagne">Espagne </option>
                            <option value="Estonie">Estonie </option>
                            <option value="Etats_Unis">Etats_Unis </option>
                            <option value="Ethiopie">Ethiopie </option>

                            <option value="Falkland">Falkland </option>
                            <option value="Feroe">Feroe </option>
                            <option value="Fidji">Fidji </option>
                            <option value="Finlande">Finlande </option>
                            <option value="France">France </option>

                            <option value="Gabon">Gabon </option>
                            <option value="Gambie">Gambie </option>
                            <option value="Georgie">Georgie </option>
                            <option value="Ghana">Ghana </option>
                            <option value="Gibraltar">Gibraltar </option>
                            <option value="Grece">Grece </option>
                            <option value="Grenade">Grenade </option>
                            <option value="Groenland">Groenland </option>
                            <option value="Guadeloupe">Guadeloupe </option>
                            <option value="Guam">Guam </option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernesey">Guernesey </option>
                            <option value="Guinee">Guinee </option>
                            <option value="Guinee_Bissau">Guinee_Bissau </option>
                            <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                            <option value="Guyana">Guyana </option>
                            <option value="Guyane_Francaise ">Guyane_Francaise </option>

                            <option value="Haiti">Haiti </option>
                            <option value="Hawaii">Hawaii </option>
                            <option value="Honduras">Honduras </option>
                            <option value="Hong_Kong">Hong_Kong </option>
                            <option value="Hongrie">Hongrie </option>

                            <option value="Inde">Inde </option>
                            <option value="Indonesie">Indonesie </option>
                            <option value="Iran">Iran </option>
                            <option value="Iraq">Iraq </option>
                            <option value="Irlande">Irlande </option>
                            <option value="Islande">Islande </option>
                            <option value="Israel">Israel </option>
                            <option value="Italie">italie </option>

                            <option value="Jamaique">Jamaique </option>
                            <option value="Jan Mayen">Jan Mayen </option>
                            <option value="Japon">Japon </option>
                            <option value="Jersey">Jersey </option>
                            <option value="Jordanie">Jordanie </option>

                            <option value="Kazakhstan">Kazakhstan </option>
                            <option value="Kenya">Kenya </option>
                            <option value="Kirghizstan">Kirghizistan </option>
                            <option value="Kiribati">Kiribati </option>
                            <option value="Koweit">Koweit </option>

                            <option value="Laos">Laos </option>
                            <option value="Lesotho">Lesotho </option>
                            <option value="Lettonie">Lettonie </option>
                            <option value="Liban">Liban </option>
                            <option value="Liberia">Liberia </option>
                            <option value="Liechtenstein">Liechtenstein </option>
                            <option value="Lituanie">Lituanie </option>
                            <option value="Luxembourg">Luxembourg </option>
                            <option value="Lybie">Lybie </option>

                            <option value="Macao">Macao </option>
                            <option value="Macedoine">Macedoine </option>
                            <option value="Madagascar">Madagascar </option>
                            <option value="Madère">Madère </option>
                            <option value="Malaisie">Malaisie </option>
                            <option value="Malawi">Malawi </option>
                            <option value="Maldives">Maldives </option>
                            <option value="Mali">Mali </option>
                            <option value="Malte">Malte </option>
                            <option value="Man">Man </option>
                            <option value="Mariannes du Nord">Mariannes du Nord </option>
                            <option value="Maroc">Maroc </option>
                            <option value="Marshall">Marshall </option>
                            <option value="Martinique">Martinique </option>
                            <option value="Maurice">Maurice </option>
                            <option value="Mauritanie">Mauritanie </option>
                            <option value="Mayotte">Mayotte </option>
                            <option value="Mexique">Mexique </option>
                            <option value="Micronesie">Micronesie </option>
                            <option value="Midway">Midway </option>
                            <option value="Moldavie">Moldavie </option>
                            <option value="Monaco">Monaco </option>
                            <option value="Mongolie">Mongolie </option>
                            <option value="Montserrat">Montserrat </option>
                            <option value="Mozambique">Mozambique </option>

                            <option value="Namibie">Namibie </option>
                            <option value="Nauru">Nauru </option>
                            <option value="Nepal">Nepal </option>
                            <option value="Nicaragua">Nicaragua </option>
                            <option value="Niger">Niger </option>
                            <option value="Nigeria">Nigeria </option>
                            <option value="Niue">Niue </option>
                            <option value="Norfolk">Norfolk </option>
                            <option value="Norvege">Norvege </option>
                            <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                            <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>

                            <option value="Oman">Oman </option>
                            <option value="Ouganda">Ouganda </option>
                            <option value="Ouzbekistan">Ouzbekistan </option>

                            <option value="Pakistan">Pakistan </option>
                            <option value="Palau">Palau </option>
                            <option value="Palestine">Palestine </option>
                            <option value="Panama">Panama </option>
                            <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                            <option value="Paraguay">Paraguay </option>
                            <option value="Pays_Bas">Pays_Bas </option>
                            <option value="Perou">Perou </option>
                            <option value="Philippines">Philippines </option>
                            <option value="Pologne">Pologne </option>
                            <option value="Polynesie">Polynesie </option>
                            <option value="Porto_Rico">Porto_Rico </option>
                            <option value="Portugal">Portugal </option>

                            <option value="Qatar">Qatar </option>

                            <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                            <option value="Republique_Tcheque">Republique_Tcheque </option>
                            <option value="Reunion">Reunion </option>
                            <option value="Roumanie">Roumanie </option>
                            <option value="Royaume_Uni">Royaume_Uni </option>
                            <option value="Russie">Russie </option>
                            <option value="Rwanda">Rwanda </option>

                            <option value="Sahara Occidental">Sahara Occidental </option>
                            <option value="Sainte_Lucie">Sainte_Lucie </option>
                            <option value="Saint_Marin">Saint_Marin </option>
                            <option value="Salomon">Salomon </option>
                            <option value="Salvador">Salvador </option>
                            <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                            <option value="Samoa_Americaine">Samoa_Americaine </option>
                            <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                            <option value="Senegal">Senegal </option>
                            <option value="Seychelles">Seychelles </option>
                            <option value="Sierra Leone">Sierra Leone </option>
                            <option value="Singapour">Singapour </option>
                            <option value="Slovaquie">Slovaquie </option>
                            <option value="Slovenie">Slovenie</option>
                            <option value="Somalie">Somalie </option>
                            <option value="Soudan">Soudan </option>
                            <option value="Sri_Lanka">Sri_Lanka </option>
                            <option value="Suede">Suede </option>
                            <option value="Suisse">Suisse </option>
                            <option value="Surinam">Surinam </option>
                            <option value="Swaziland">Swaziland </option>
                            <option value="Syrie">Syrie </option>

                            <option value="Tadjikistan">Tadjikistan </option>
                            <option value="Taiwan">Taiwan </option>
                            <option value="Tonga">Tonga </option>
                            <option value="Tanzanie">Tanzanie </option>
                            <option value="Tchad">Tchad </option>
                            <option value="Thailande">Thailande </option>
                            <option value="Tibet">Tibet </option>
                            <option value="Timor_Oriental">Timor_Oriental </option>
                            <option value="Togo">Togo </option>
                            <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                            <option value="Tristan da cunha">Tristan de cuncha </option>
                            <option value="Tunisie">Tunisie </option>
                            <option value="Turkmenistan">Turmenistan </option>
                            <option value="Turquie">Turquie </option>

                            <option value="Ukraine">Ukraine </option>
                            <option value="Uruguay">Uruguay </option>

                            <option value="Vanuatu">Vanuatu </option>
                            <option value="Vatican">Vatican </option>
                            <option value="Venezuela">Venezuela </option>
                            <option value="Vierges_Americaines">Vierges_Americaines </option>
                            <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                            <option value="Vietnam">Vietnam </option>

                            <option value="Wake">Wake </option>
                            <option value="Wallis et Futuma">Wallis et Futuma </option>

                            <option value="Yemen">Yemen </option>
                            <option value="Yougoslavie">Yougoslavie </option>

                            <option value="Zambie">Zambie </option>
                            <option value="Zimbabwe">Zimbabwe </option>

                    </select>
                </div>
                <div class="categories">
                Sujet :
                  <span class="error"><?php echo $sujetErr; ?></span><select name="sujet">
                      <option value="">- Sélectionnez -</option>
                      <option value="Matériel défectueux">Matériel Défectueux</option>
                      <option value="Aide au montage">Aide au montage</option>
                      <option value="Pièce manquante">Pièce manquante</option>
                      <option value="Autre">Autre</option>
                  </select>
                </div>
            </div>
        </div>
        <div class="floatleft">
                 <div class="msg">
                      Message<span class="astespan">*</span> :
                 </div>
                 <span class="error"><?php echo $messageErr; ?></span><textarea name="message" placeholder="Tapez ici votre message" ></textarea>
                 <input class="button" type="submit" name="submit" value="Envoyer le formulaire">
                 <input class="button" type="reset" />
            </form>
                <div class="aste">
                  Les champs marqués d'un astérisque (*) sont obligatoires <br>
                </div>
        </div>
      </section>
      <footer>
          ©Copyright BeCode - 2018/2019
      </footer>
</body>
</html>
