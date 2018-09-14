<?php include('testalgohug.php'); ?>
<?php
try
{
    $con = new PDO("mysql:host=localhost;dbname=espace_membre","root","");

    $getid = intval($_GET['id']);

    $delete = $con->prepare("DELETE FROM membres WHERE id = '$getid'");

    $delete->execute();
    header("Location: profil.php");
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
?>
