<?php
if (isset($_POST['submit'])) {
    // Some fast validation
    if (empty($_POST['name']) || empty($_POST['secret']) || empty($_POST['password'])) {
        exit('Fill in those damn credentials.');
    }

    if (preg_match('=^[^/?*;:\.{}\\\\]+=', $_POST['name']) === 0) {
        exit ('Your name is not valid. A lot is not allowed. Make it so we can save it ton the disk as a file name.');
    }

    // Damn strong. ECB cuz you're cooler then CBC and you don't throw things like it's insecure.
    $rubbish = openssl_encrypt($_POST['secret'], 'AES-256-ECB', $_POST['password']);

    $success = file_put_contents(__DIR__ . '/database/' . $_POST['name'] . '.customfileformatcuzcool', $rubbish);

    if ($success) {
        echo 'ok success, file saved. Try to decrypt it now.';
    } else {
        echo 'something went wrong, and I do not know what w00t.';
    }
}
// wos@avans.nl for real ;)
?>
<h1>Encrypt-R-us</h1>
<form action="" method="POST">
    <label for="name">Naam:</label>
    <input type="text" id="name" name="name"/><br/>

    <label for="secret">Geheime tekst:</label>
    <textarea id="secret" name="secret"></textarea><br/>

    <label for="password">Wachtwoord:</label>
    <input type="text" id="password" name="password"/><br/>

    <input type="submit" value="Sla op" name="submit"/>
</form>