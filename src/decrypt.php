<?php
if (isset($_POST['submit'])) {
    // Some fast validation
    if (empty($_POST['name']) || empty($_POST['password'])) {
        exit('Fill in those damn credentials.');
    }

    if (preg_match('=^[^/?*;:\.{}\\\\]+=', $_POST['name']) === 0) {
        exit ('Your name is not valid. A lot is not allowed. Make it so we can save it ton the disk as a file name.');
    }

    $rubbish = file_get_contents(__DIR__ . '/database/' . $_POST['name'] . '.customfileformatcuzcool');

    // Damn strong. ECB cuz you're cooler then CBC and you don't throw things like it's insecure.
    $decoded = openssl_decrypt($rubbish, 'AES-256-ECB', $_POST['password']);

    if ($decoded) {
        echo 'ok awesome, we got your file back. Let me print now without worrying about hacking you. Heres your.. $rubbish:<br/>';
        echo '<pre>' . $decoded . '</pre>';
    } else {
        echo 'something went wrong, and I do not know what w00t.';
    }
}
// wos@avans.nl for real ;)
?>
<h1>Decrypt-R-us</h1>
<form action="" method="POST">
    <label for="name">Naam:</label>
    <input type="text" id="name" name="name"/><br/>

    <label for="password">Wachtwoord:</label>
    <input type="text" id="password" name="password"/><br/>

    <input type="submit" value="Sla op" name="submit"/>
</form>