<?php
    session_start();
    include("pdo.php");
    include("get_users.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scodoc - Envoyer un message</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
	<!-- you need to include : pour travailler sur les images -->
	<link rel="stylesheet" type="text/css" href="css/utilisateur.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>    
	<!-- you need to include : pour travailler sur les tableaux -->
	<script type="text/javascript" src="js/dataTables-utilisateur.min.js"></script>  
	
</head>
<body>

    <div id="wrapper">
        <?php include("nav.php"); ?>
        	<div class="row center-block">
            <form action="" method="POST">
                <div class="col-lg-4">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Sujet :</span>
                      <input type='text' name="subject" id="subject" class='form-control' placeholder='Ex : Modification de la date du contrôle de COO' aria-describedby='basic-addon1' required>
                    </div>
                </div>
                <br><br>

                <?php /* if(isset($_GET["recipient"])){ ?>

                <!-- <div class="col-lg-3">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Destinataire :</span>
                        <?php echo "<input type='text' name='recipient' id='recipient' class='form-control' aria-describedby='basic-addon1' readonly required value='".$_GET["recipient"]."'>"; ?>
                    </div>
                </div>
                <br><br> -->

                <?php } 

                else{ */ ?>

                <div class="col-lg-3">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Destinataire :</span>
                        <select name="recipient" id="recipient" class="form-control" required>
                            <?php get_users_list(); ?>
                        </select>
                    </div>
                </div>
                <br><br>

                <?php /* } */ ?>

                <div class="col-lg-5">
                    <div class="input-group">
                        <label>Message</label>
                        <br>
                        <textarea cols='58' rows='6' name="body" id="body" style="resize: none;"></textarea>
                    </div>
                </div>
                <br><br><br><br><br><br><br><br>

                <div class="col-lg-2">
                    <button type="reset" class="btn btn-info">
                        Réinitialiser
                    </button>
                    <button type="submit" class="btn btn-info" name="send" id="send">
                        Envoyer
                    </button>
                </div>

            </form>
            <br><br><br>

            <?php

                if(isset($_POST["send"]))
                {
                    $req = $pdo->prepare('INSERT INTO messages(subject, body, recipient_id, sender_id) VALUES(:subject, :body, :recipient_id, :sender_id)');
                    $req->execute(array(
                    'subject' => $_POST["subject"],
                    'body' => $_POST["body"],
                    'recipient_id' => $_POST['recipient'],
                    'sender_id' => $_SESSION['id']
                    ));

                    echo "<div class='col-lg-4'><div class='alert alert-success' role='alert'>Votre message a bien été envoyé à ".get_user($_POST['recipient'])."</div></div>";

                }

            ?>

            </div>
    </div>
</body>
</html>
