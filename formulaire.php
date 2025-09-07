<?php
// Only run if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get and sanitize input
    $nom = htmlspecialchars($_POST['nom']);
    $objet = htmlspecialchars($_POST['objet']);
    $mail = htmlspecialchars($_POST['mail']);
    $message = htmlspecialchars($_POST['message']);

    // Recipient
    $destinataire = 'a.perrillat@live.fr';

    // Email content (HTML)
    $contenu = '<html><head><title>' . $objet . '</title></head><body>';
    $contenu .= '<p>You have a new message!</p>';
    $contenu .= '<p><strong>Name</strong>: ' . $nom . '</p>';
    $contenu .= '<p><strong>Email</strong>: ' . $mail . '</p>';
    $contenu .= '<p><strong>Message</strong>: ' . nl2br($message) . '</p>';
    $contenu .= '</body></html>';

    // Headers for HTML email
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: " . $mail . "\r\n";  // Optional: sender email

    // Send email
    if (mail($destinataire, $objet, $contenu, $headers)) {
        // Redirect back to homepage with success message
        header("Location: index.html?success=1");
        exit;
    } else {
        // Redirect back with error
        header("Location: index.html?error=1");
        exit;
    }
}
?>
