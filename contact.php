
<?php

// Connexion à la base de données
require 'configuration-php/config.php'; // Assure-toi que config.php contient bien $pdo

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom_client   = trim($_POST['nom-client']);
    $email_client = trim($_POST['email-client']);
    $telephone    = trim($_POST['telephone']);
    $type_service = trim($_POST['type-service']);
    $message      = trim($_POST['message']);

    $sql = "INSERT INTO contact (nom_client, email_client, telephone, type_service, message)
            VALUES (:nom_client, :email_client, :telephone, :type_service, :message)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nom_client'   => $nom_client,
        ':email_client' => $email_client,
        ':telephone'    => $telephone,
        ':type_service' => $type_service,
        ':message'      => $message
    ]);

    echo "Client enregistré avec succès !";
}
?>
