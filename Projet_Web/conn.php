<?php session_start();

     include('connexion.php');
	 if(isset($_POST['formconnexion']))
	 {
		 $mailconnect = htmlspecialchars($_POST['mailconnect']);
	     $mdpconnect = sha1($_POST['mdpconnect']);
	     if(!empty($mailconnect) AND !empty($mdpconnect))
		 {
			 $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
			 $requser->execute(array($mailconnect, $mdpconnect));
			 $userexist = $requser->rowCount();
			 if($userexist == 1)
			 {
			   $userinfo = $requser->fetch();
			   $_SESSION['id'] = $userinfo['id'];
			   $_SESSION['pseudo'] = $userinfo['pseudo'];
			   $_SESSION['mail'] = $userinfo['mail'];
			   header("Location: profil.php?id=".$_SESSION['id']);
			 }
			 else
			 {
				 $erreur = "Mauvais mail ou mot de passe";
			 }
		 }
		 else
		 {
			 $erreur = "Tous les champs doivent etre remplis";
		 }
	 }
		

?>


<! DOCTYPE html>
<html>
     <head>
	      <title></title>
		  <meta charset="utf-8">
		  <link rel="stylesheet" href="styleuser.css"/>
		  <link rel="stylesheet" href="stylenew.css" />
		  <link rel="stylesheet" href="CSS/style.css" />
		  <link rel="stylesheet" href="style.css" type="text/css" media="all" />
          <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css" type="text/css" media="all" />
          <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />
	 <head>
	  <body>
	
	      <div align="center">
		     <header>
		      <h1><strong>CONNEXION</strong></h1>
			 </header>
			  <br/><br/>
			  <form method="POST" action="">
			     <table>
				    <tr>
				       <td align="right">
			               <label for="mailconnect">Adresse email</label>
					   </td>
					   <td>
			              <input type="email" placeholder="votre email" name="mailconnect" />
					   </td>
					</tr>
					<tr>
				       <td align="right">
			               <label for="mdpconnect">Mot de passe</label>
					   </td>
					   <td>
			              <input type="password" placeholder="votre mot de passe" name="mdpconnect" />
					   </td>
					</tr>
					   <td>
			              <input type="submit" name="formconnexion" value="Se connecter !" />
					   </td>
					</tr>
			</table>
			  </form>
			  <p>Si vous n'etes pas encore inscris, veillez le faire en cliquant <a href="inscription.php"><strong><em>ici</em></strong></p>
			  <?php if(isset($erreur))
			  {
				  echo '<font color="red">'.$erreur."</font>";
			  }
		      ?>
		  </div>
	 </body>
</html>