<?php

/**
 * Pour cet exercice, vous allez utiliser la base de données table_test_php créée pendant l'exo 189
 * Vous utiliserez également les deux tables que vous aviez créées au point 2 ( créer des tables avec PHP )
 */

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'table_test_php';

try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */

    $pdo = new PDO("mysql:host=$server;dbname=$db;charset=utf8",$user,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    // TODO votre code ici.
    $sql = "
        INSERT INTO utilisateur (nom, prenom, email, password, adresse, code_postal, pays)
        VALUES ('Doe', 'John', 'john.doe@outlook.fr', '1234', '24 rue là-bas', 59610, 'France')
    ";
//    $pdo->exec($sql);
    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    // TODO votre code ici.
    $sql2 = "
        INSERT INTO produit (titre, prix, short_description, description)
        VALUES ('perle', 1.50, 'perle ronde onyx', 'diametre : 8mm, matiére : onyx noir')
    ";
//    $pdo->exec($sql2);
    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    // TODO Votre code ici.
    $sql3 = "
        INSERT INTO utilisateur (nom, prenom, email, password, adresse, code_postal, pays)
        VALUES ('Conor', 'John', 'john.Connor@outlook.fr', 'azerty', '8 rue ici', 59610, 'France'),
        ('Conor', 'Sarah', 'sarah.Connor@hotmail.fr', 'qwerty', '30 rue autre-rue', 59610, 'France')
    ";
//    $pdo->exec($sql3);
    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    // TODO Votre code ici.
    $sql4 = "
        INSERT INTO produit (titre, prix, short_description, description)
        VALUES ('cordon', 1, 'cordon noir', 'diametre : 1mm, matiére : coton'),
        ('perle', 0.8, 'perle ronde verre', 'diametre : 6mm, matiére : verre, couleur : bleu transparent')
    ";
//    $pdo->exec($sql4);
    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    // TODO Votre code ici.
//    $pdo->beginTransaction();
//    $insertU = 'INSERT INTO utilisateur (nom, prenom, email, password, adresse, code_postal, pays) VALUES ';
//
//    $sql5 = $insertU."('Bloom', 'Oralndo', 'legolas@hotmail.fr', 'elfe01', '1 rue de la foret', '59610', 'France')";
//    $pdo->exec($sql5);
//
//    $sql6 = $insertU."('Mortensen', 'Viggo', 'grand-pas@live.fr', 'aragorn', '8 rue du chateau', '59610', 'France')";
//    $pdo->exec($sql6);
//
//    $sql7 = $insertU."('Wood', 'Elijah', 'frodon@live.fr', 'hobbit', '52 rue hobbit-bourg', '59610', 'France')";
//    $pdo->exec($sql7);
//
//    $pdo->commit();

    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */
    $pdo->beginTransaction();
    $insertP = 'INSERT INTO produit (titre, prix, short_description, description) VALUES ';

    $sql8 = $insertP."('cabochon', 1.2, 'cabochon oval', 'cabochon oval, taille : 18-25, motif papillon violet')";
    $pdo->exec($sql8);

    $sql9 = $insertP."('rocaille', 2.5, 'rocaille argent', 'sachet de 15gr, taille : 11-0, couleur argent')";
    $pdo->exec($sql9);

    $sql10 = $insertP."('perle', 1, 'perle carre', 'perle carré en bois taille : 15mm, naturel')";
    $pdo->exec($sql10);

    $pdo->commit();

}
catch (PDOException $e){
    echo "Une erreur est survenue : ".$e->getMessage()."<br>";

    $pdo->rollBack();
}
