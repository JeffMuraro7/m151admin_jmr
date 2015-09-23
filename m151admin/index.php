<!DOCTYPE html>

<?php
    include 'function.php';

    if(isset($_REQUEST['Valider'])) {
        $nom = $_REQUEST['nom'];
        $prenom = $_REQUEST['prenom'];
        $birthday = $_REQUEST['birthday'];
        $description = $_REQUEST['description'];
        $email = $_REQUEST['email'];
        $pseudo = $_REQUEST['pseudo'];
        $password = sha1($_REQUEST['password']);
        
        insertUser($nom, $prenom, $birthday, $description, $email, $pseudo, $password);
    }
    
    $nom = "";
    $prenom = "";
    $birthday = "";
    $description = "";
    $email = "";
    $pseudo = "";
    $password = "";
    
    if(isset($_REQUEST['id']))
    {
        $idUserSearch = $_REQUEST['id'];
        
        $tab = selectOneUser($idUserSearch);
        
        foreach($tab as $value)
        {
            $nom = $value['nom'];
            $prenom = $value['prenom'];
            $birthday = $value['dateNaissance'];
            $description = $value['description'];
            $email = $value['email'];
            $pseudo = $value['pseudo'];
            $password = "Laissez vide si vous ne voulez pas le changer!";
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>m151admin</title>
    <link rel="stylesheet" type="text/css" href="myStyle.css" />
</head>
    <body>
        <div id="center">
            <nav>
                <a href="affichageUsers.php">Liste utilisateurs</a>
            </nav>


            <form id="formulaire" method="post" action="index.php">
                <fieldset>
                    <legend>Formulaire</legend>

                    <label class="styleLabel" for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" class="styleInput" value="<?php echo $nom ?>" required autofocus />

                    <label class="styleLabel" for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" class="styleInput" value="<?php echo $prenom ?>" required />

                    <label class="styleLabel" for="birthday">Date de naissance :</label>
                    <input type="date" id="birthday" name="birthday" class="styleInput" value="<?php echo $birthday ?>" required />

                    <label class="styleLabel" for="description">Description :</label>
                    <textarea id="description" name="description" class="styleInput" required><?php echo $description ?></textarea>

                    <label class="styleLabel" for="email">Email :</label>
                    <input type="email" id="email" name="email" class="styleInput" value="<?php echo $email ?>" required />

                    <label class="styleLabel" for="pseudo">Pseudo :</label>
                    <input type="text" id="pseudo" name="pseudo" class="styleInput" value="<?php echo $pseudo ?>" required />

                    <label class="styleLabel" for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" class="styleInput" placeholder="<?php echo $password ?>" /> </br>
                    
                    <?php
                        if(isset($_REQUEST['id'])) {
                            echo "<input type='submit' name='Modifier' value='Modifier' id='valider' /> <a href='affichageUsers.php'><input type='reset' value='Annuler'></a>";
                        }
                        else {
                           echo "<input type='submit' name='Valider' value='Envoyer' id='valider' /> <input type='reset' name='Reset' value=' Annuler ' id='reset' />";
                        }
                    ?>
                    
                    
                </fieldset>
            </form>
        </div>
    </body>
</html>

