<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
           <meta charset="UTF-8"/>
		   <meta name="viewport" content="width=device-width, initial-scale=1">
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		   <link rel="stylesheet" href="CSS/stylenew.css" />
		   <link rel="stylesheet" href="CSS/style4.css" />
		   <link rel="stylesheet" href="CSS/style.css" />
		   <SCRIPT language="JavaScript">
              function delete_confirm()
                                      {
                                        confirm("Voulez-vous vraiment supprimer ?");
                                        if(Check == false) history.back();
           </script>
		<style>
            tr,th,td
	       {
              border: 5px groove green;
		      box-shadow: 7px 7px 7px black;
	       }
        </style>
</head>
<body id="main">
<center>
 <header>
		      <h1><strong>PROFIL</strong></h1>
</header>
<table bgcolor=" #f2d7d5 " border="15" width="80%" height="30%">
    <tr>
        <th width="50" align="center" bgcolor="#FFF000">Pseudo</th>
		<th width="50" align="center" bgcolor="#FFF000">Email</th>
        <th width="50" align="center" bgcolor="#FFF000" colspan="3">Actions</th>
     <tr/>
<?php
try{
     $con = new PDO("mysql:host=localhost;dbname=espace_membre","root","");
	 if(isset($_GET['id']) AND $_GET['id'] > 0)
	 {
	    $getid = intval($_GET['id']);
		$requser = $con->prepare('SELECT * FROM membres WHERE id = ?');
		$requser->setFetchMode(PDO::FETCH_ASSOC);
		$requser->execute(array($getid));
		//$userinfo = $requser->fetch();
     while($userinfo=$requser->fetch())
     {
?>
<tr>
    <td><?php echo $userinfo['pseudo'];?></td>
	<td><?php echo $userinfo['mail'];?></td>
    <td width="50" align="center" bgcolor="#7fff00"><a href="updateuser.php?getid=<?php echo $userinfo['id'];?>" onclick="return confirm('Êtes-vous certain de vouloir modifier les informations ?')"><i style="font-size:24px" class="fa">&#xf044;</i></a></td>
    <td width="50" align="center" bgcolor="#FF0000"><a href="deleteuser.php?getid=<?php echo $userinfo['id'];?>"onclick="return confirm('Êtes-vous certain de vouloir définitivement éffacer ?')"><i style="font-size:24px" class="fa">&#xf00d;</i></a></td>
<?php
      }
	 }
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
?>
</tr>
</table>
<div>
<p><h4><div style="width:auto;overflow:hidden;">Pour vous deconnecter, cliquer <a href="deconnexion.php"><i class="fa fa-frown-o" style="font-size:25px;color:red"></i></a></div></h4></p>
</div>
</center>
</body>
</html>