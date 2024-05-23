<?php
session_start();
if (!isset($_SESSION["email"])) {
    echo "please sign in";
    header("location:signin.php");
} else {
    require __DIR__ . "/../config/db.php";
    //  ___________________recupere les donnes par id______________________________________

    if (isset($_POST["envoyer"])) {

        // var_dump($_SESSION["ID"]);
        // ________________________________________________________________________________

        // INSERT INTO ARTICLE TABLE and update

        if (isset($_GET['id'])) {
            $titre = $_POST["titre"];
            $etat = $_POST["etat"];
            $description = $_POST["description"];
            $adresse = $_POST["adresse"];
            $prix = $_POST["prix"];
            $id = $_GET["id"];
            $updateRequete = "UPDATE article SET titre='$titre',etat=' $etat',description='$description',adresse='$adresse',prix_pre_paye='$prix' WHERE id_article=$id";
            // var_dump($updateRequete);
            $stmt = $conn->prepare($updateRequete);
            $stmt->execute();
        } else {
            // deposer insert
            $categorie = $_POST["categorie"];
            $address = $_POST["adresse"];
            $etat = $_POST["etat"];
            $prix = $_POST["prix"];
            // $prix_negociable=$_POST["negociable"];
            $prix_negociable = $_POST["negociable"];
            var_dump($prix_negociable);
            $titre = $_POST["titre"];
            $description = $_POST["description"];

            $article_echangeable = $_POST["echangeable"];
            var_dump($article_echangeable);
            //______________________________________________________________ 


            $photo = $_FILES["photo"]["name"];


            $fileName = basename($_FILES["photo"]["name"]);
            $targetFilePath = dirname(dirname(__FILE__)) . "/assets/imgs/" . $fileName;
            echo $targetFilePath;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            $allowedTypes = array('jpg', 'png', 'jpeg', 'gif', 'bmp');
            if (in_array(strtolower($fileType), $allowedTypes)) {
                if ($_FILES["photo"]["error"] == 0) {

                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {

                        echo "The file " . htmlspecialchars($fileName) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } else {
                    echo "Error: " . $_FILES["photo"]["error"];
                }
            } else {
                echo "Sorry, only JPG, JPEG, PNG, GIF, & BMP files are allowed.";
            }
            //______________________________________________________________
            // echo $photo;
            // $sql="INSERT INTO article(id_categorie,adresse,etat,prix_pre_paye,prix_negociable,titre,description,photo_de_article,article_echangeable) values('$categorie',' $address','$etat','$prix','$prix_negociable','$titre','$description','$photo','$article_echangeable')";
            $sql = "INSERT INTO article(id_categorie,adresse,etat,prix_pre_paye,prix_negociable,titre,description,photo_de_article,article_echangeable) values('$categorie',' $address','$etat','$prix','$prix_negociable','$titre','$description','$photo','$article_echangeable')";
            var_dump($sql);
            $stmt = $conn->prepare($sql);
            // $stmt->execute();
            echo $stmt->execute();
            if ($stmt->execute()) {
                echo "<h1>INSERTION AVEC SUCCES</h1>";
            } else {
                echo "<h1>ERROR</h1>";
            }
        }
    }
    //____________________________________________________________________________




    // remplire select of categories
    $selectCategorie = "SELECT * FROM categorie ";
    $stmt = $conn->query($selectCategorie);
    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
    <?php
    // RECUPERATIN DES DONNES AUX INPUTS DE FORMULAIRE
    if (isset($_GET['id'])) {

        $id = $_GET['id'];
        $sql = "SELECT * FROM article WHERE id_article=$id";
        $stmt = $conn->query($sql);
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        //stocker les resultat dans les variables
        $titre = $rows["titre"];
        $etat = $rows["etat"];
        $description = $rows["description"];
        $adresse = $rows["adresse"];
        $prix = $rows["prix_pre_paye"];
        $prix_negociable = $rows["prix_negociable"];
    }
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>créer annonce</title>

    </head>

    <body>
        <h1>Product Form</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- hidden input -->
            <input type="hidden" name='id' value=<?php if (isset($_GET['id'])) {
                                                        echo $_GET['id'];
                                                    }  ?> placeholder=""><br><br>
            <!-- ******* -->
            <!-- select categorie -->
            <label for="categorie">Catégorie:</label>
            <select name="categorie" id="categorie">
                <?php
                foreach ($resultat as $key) {

                    echo ' <option value=' . $key["id_categorie"] . '>' . $key["nom_categorie"] . '</option>';
                }
                ?>

            </select><br>

            <label for="adresse">Votre Adresse:</label>
            <input type="text" name="adresse" value=" <?php if (isset($_GET['id'])) {
                                                            echo $adresse;
                                                        } ?> " id="adresse"><br>

            <!-- <label for="telephone">Numéro de Téléphone:</label>
        <input type="tel" name="telephone" id="telephone"><br> -->

            <label for="etat">État du Bien:</label>
            <select name="etat" id="etat">

                <option value=" <?php if (isset($_GET['id'])) {
                                    echo $etat;
                                } else {
                                    echo "Très bon";
                                } ?> ">Très bon</option>
                <option value="<?php if (isset($_GET['id'])) {
                                    echo $etat;
                                } else {
                                    echo "bon";
                                } ?>">Bon</option>
                <option value="<?php if (isset($_GET['id'])) {
                                    echo $etat;
                                } else {
                                    echo " correct";
                                } ?>">Correct</option>
                <option value="<?php if (isset($_GET['id'])) {
                                    echo $etat;
                                } else {
                                    echo "endommagé";
                                } ?>">Endommagé</option>
                <option value="<?php if (isset($_GET['id'])) {
                                    echo $etat;
                                } else {
                                    echo "Pour pièces";
                                } ?>">Pour pièces</option>
            </select><br>

            <label for="prix">Prix de Vente:</label>
            <input type="number" name="prix" value="<?php if (isset($_GET['id'])) {
                                                        echo $prix;
                                                    } ?>" id="prix"><br>

            <label for="negociable">Prix Négociable:</label>
            <input type="radio" name="negociable" value="<?php if (isset($_GET['id'])) {
                                                                echo $prix_negociable;
                                                            } else {
                                                                echo "oui";
                                                            } ?> " id="negociable_oui">
            <label for="negociable_oui">Oui</label>
            <input type="radio" name="negociable" value="<?php if (isset($_GET['id'])) {
                                                                echo $prix_negociable;
                                                            } else {
                                                                echo "non";
                                                            } ?> " id="negociable_non" checked>
            <label for="negociable_non">Non</label><br>
            <!-- article echangeable -->
            <label for="echangeable">Article echangeable</label>
            <input type="radio" name="echangeable" value="<?php if (isset($_GET['id'])) {
                                                                echo $article_echangeable;
                                                            } else {
                                                                echo "oui";
                                                            } ?> " id="echangeable_oui">
            <label for="echangeable_oui">Oui</label>
            <input type="radio" name="echangeable" value="<?php if (isset($_GET['id'])) {
                                                                echo $article_echangeable;
                                                            } else {
                                                                echo "non ";
                                                            } ?> " id="echangeable_non" checked>
            <label for="echangeable_non">Non</label><br>


            <label for="titre">Titre de l'Article:</label>
            <input type="text" name="titre" value="<?php if (isset($_GET['id'])) {
                                                        echo $titre;
                                                    } ?> " id="titre"><br>

            <label for="description">Description:</label><br>
            <textarea name="description" id="description" cols="30" rows="10"><?php if (isset($_GET['id'])) {
                                                                                    echo $description;
                                                                                } ?></textarea><br>

            <label for="photo">Upload Photo:</label>
            <input type="file" name="photo" id="photo" accept="image/*"><br>
            <button type="submit" name="envoyer">
                <?php
                if (isset($_GET["id"])) {
                    echo "modifier";
                } else {
                    echo "deposer";
                }
                ?>
            </button>
        </form>

    </body>

    </html>

<?php } ?>