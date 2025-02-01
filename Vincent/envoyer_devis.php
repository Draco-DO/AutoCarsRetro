<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire
        $firstname = htmlspecialchars($_POST['first-name']);
        $lastname = htmlspecialchars($_POST['last-name']);
        $compagny = htmlspecialchars($_POST['compagny']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $message = htmlspecialchars($_POST['message']);

        // Vérifie si des services supplémentaires ont été cochés
        $vehicules = isset($_POST['vehicules']) ? implode(", ", $_POST['vehicules']) : "Aucun vehicule sélectionné";


        // Destinataire et sujet de l'email
        $to = "votre_email@exemple.com";  // Remplacez par votre adresse email
        $subject = "Nouvelle demande de devis";

        // Contenu de l'email
        $body = "Prénom : $firstname\n";
        $body = "Nom : $lastname\n";
        $body = "Société : $compagny\n";
        $body .= "Email : $email\n";
        $body .= "Téléphone : $phone\n";
        $body .= "Détails du projet :\n$message\n";
        $body .= "Véhicule(s) concerné(s) : $services\n";  // Ajout des services sélectionnés

        // Entêtes de l'email
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Envoi de l'email
        if (mail($to, $subject, $body, $headers)) {
            echo "Votre demande de devis a été envoyée avec succès.";
        } else {
            echo "Une erreur s'est produite lors de l'envoi de votre demande. Veuillez réessayer.";
        }
    }
?>