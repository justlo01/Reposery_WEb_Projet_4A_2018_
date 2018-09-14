<?php
     include('connexion.php');

if(isset($_POST['forminscription']))
{
	echo 1; 
	    $pseudo = htmlspecialchars($_POST['pseudo']);
		 $mail = htmlspecialchars($_POST['mail']);
		 $mail2 = htmlspecialchars($_POST['mail2']);
		 $mdp   = sha1($_POST['mdp']);
		 $mdp2  = sha1($_POST['mdp2']);
		
	if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp'])AND !empty($_POST['mdp2']))
	{
		echo 4;
		echo 2; 
		$pseudolength = strlen($pseudo);
		if($pseudolength <=255)
		{	
	echo 3; 
			if($mail == $mail2)
			{ 
		echo 4; 
		      if(filter_var($mail, FILTER_VALIDATE_EMAIL))
			  {
				  echo 5; 
				  $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
				  $reqmail->execute(array($mail));
				  $mailexist = $reqmail->rowCount();
				  if($mailexist == 0)
				  {
					  echo 6;
				if($mdp == $mdp2)
				{
					echo 7; 
					$insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
					$insertmbr->execute(array($pseudo, $mail, $mdp));
					$erreur = "Felicitation votre compte a bien été créé ! <a href=\"conn.php\">Me connecter</a>";
					
					
					
					
				}
				else
				{
					$erreur= "Vos mots de passe ne sont pas identiques";
					echo 8;
				}
				  }
				  else
				  {
					  $erreur = "Adresse mail deja utilisé";
					  echo 9;
				  }
			  }
			  else
			  {
				  $erreur = "Votre adresse mail n'est pas valide";
				  echo 10;
			  }
			}
			else
			{
				$erreur = "Vos adresse mails ne correspondent pas";
				echo 11;
			}
		}
		else
		{
			$erreur = "Votre pseudo ne doit pas depasser 225 caracteres";
			echo 12;
		}
	}
    else
    {
		$erreur = "Tous les champs doivent être completés";
		echo 5;
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
		      <h1><strong>INSCRIPTION</strong></h1>
			 </header>
			  <br/><br/>
			  <form method="POST" action="">
			     <table>
				    <tr>
				       <td align="right">
			               <label for="pseudo">Entrer votre pseudo</label>
					   </td>
					   <td>
			              <input type="text" placeholder="votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)){echo $pseudo;} ?>" />
					   </td>
					</tr>
					<tr>
				       <td align="right">
			               <label for="mail">Entrer votre email</label>
					   </td>
					   <td>
			              <input type="email" placeholder="votre email" id="mail" name="mail" value="<?php if(isset($mail)){echo $mail;} ?>" />
					   </td>
					</tr>
					<tr>
					   <td align="right">
			               <label for="mail2">Confirmez votre email</label>
					   </td>
					   <td>
			              <input type="email" placeholder="Confirmez votre email" id="mail2" name="mail2" value="<?php if(isset($mail2)){echo $mail2;} ?>" />
					   </td>
					<tr>
					   <td align="right">
			               <label for="mdp">Entrer votre mot de passe</label>
					   </td>
					   <td>
			              <input type="password" placeholder="votre mot de passe" id="mdp" name="mdp" />
					   </td>
					</tr>
					<tr>
					   <td align="right">
			               <label for="mdp2">Confirmez votre mot de passe</label>
					   </td>
					   <td>
			              <input type="password" placeholder="confirmez votre mot de passe" id="mdp2" name="mdp2" />
					   </td>
					</tr>
					<tr>
					   <td>
					   </td>
					   <td>
			              <input type="submit" name="forminscription" value="Je m'inscris" />
					   </td>
					</tr>
			</table>
			  </form>
			  <?php if(isset($erreur))
			  {
				  echo '<font color="red">'.$erreur."</font>";
			  }
		      ?>
		  </div>
	 </body>
</html>