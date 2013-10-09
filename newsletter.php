<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title>Wolfplex Hackerspace - Créer un hackerspace à Charleroi</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<link rel="stylesheet" href="css/theme/wolfplex.css" id="theme">

		<!--[if lt IE 9]>
		<script src="lib/js/html5shiv.js"></script>
		<![endif]-->

        <style>
            body {
                min-height: 100%;
            }

            #you {
                margin: auto;
                position: absolute;
                top: 0; left: auto; bottom: 0; right: 10%;
                height: 378px;
                width: 603px;
                text-align: center;
                background-color: #090909;
                padding: 1em 1em;
            }

        </style>
	</head>
    <body>
        <div class="reveal">
            <div class="slides">
               <section id="you">
<?php
    $subscribed = false;
    $error = '';
    if (array_key_exists('mail', $_POST)) {
        $mail = $_POST['mail'];
        if (preg_match('/@/', $mail)) {
            $subscribed = true;
            $fd = fopen('../../.dat/2013.txt', 'a');
            fwrite($fd, "$mail\n");
            fclose($fd);
        } else {
            $error = "Pas un mail.";
        }
    } else {
        $mail = '';
    }
    if ($subscribed) {
?>
                    <h1>Bienvenue :-)</h1>
                    <p>Nous avons bien noté ton mail,<br /><?= $_POST['mail'] ?></p>
                    <p>Un membre te recontactera pour discuter<br />un peu et répondre à tes questions.</p>
                    <p>Tu peux aussi rejoindre notre canal IRC<br />[ <a href="http://irc.lc/wolfplex">Webchat</a> | <a href="irc://irc.freenode.net/wolfplex">Freenode #wolfplex</a> ]
<?php
    } else {
?>
                    <h1>YOU</h1>
					<h4>« Dans un hackerspace, il n'y a pas de passagers,<br /> que des membres de l'équipage. »</h4>
                    <hr />
<?php
    if ($error) {
        echo "<p>$error</p>";
    } else {
        echo "<p>Tu es le bienvenu pour<br />rejoindre notre projet.</p>";
    }
?>
                    <p>Intéressé ? Laisse-nous ton mail ici :
                    <form method="post">
                        <input id="mail" name="mail" type="text" size="48" value="<?= $mail ?>" />
                        <input id="ok" type="submit" value="OK" />
                    </form>
<?php
    }
?>
				</section>
            </div>
        </div>
	</body>
</html>
