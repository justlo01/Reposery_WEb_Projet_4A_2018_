<?php include("allmenuappt.php"); ?>
<!DOCTYPE html>
<html>
<head>
           <meta charset="UTF-8"/>
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
        border: 5px groove indigo ;
		 box-shadow: 6px 6px 6px black;
	   }
</style>
</head>
<body id="main">
<center>
<table bgcolor=" #f2d7d5 " border="50" width="70%" height="10%">
    <tr>
        <th width="50" align="center" bgcolor="#FFF000">ID</th>
        <th width="50" align="center" bgcolor="#FFF000">Ordianteur</th>
		<th width="50" align="center" bgcolor="#0822ca">radio</th>
		<th width="50" align="center" bgcolor="#0822ca">unitecentrale</th>
        <th width="50" align="center" bgcolor="#4f08ca">mangue</th>
		<th width="50" align="center" bgcolor="#4f08ca">cerise</th>
        <th width="50" align="center" bgcolor="#0c7385">parapluie</th>
        <th width="50" align="center" bgcolor="#FFF000" colspan="8">Action</th>
     <tr/>
<?php
try{
     $con = new PDO("mysql:host=localhost;dbname=espace_membre","root","");
     $select = $con->prepare("SELECT * FROM panier");
     $select->setFetchMode(PDO::FETCH_ASSOC);
     $select->execute();
     while($data=$select->fetch())
     {
?>
<tr>
    <td><?php echo $data['id'];?></td>
    <td><?php echo $data['ordinateur'];?></td>
	<td><?php echo $data['radio'];?></td>
	<td><?php echo $data['unitecentrale'];?></td>
    <td><?php echo $data['mangue'];?></td>
	<td><?php echo $data['cerise'];?></td>
    <td><?php echo $data['parapluie'];?></td>
    <td width="50" align="center" bgcolor="#7fff00"><a href="updatepanier.php?edit_id=<?php echo $data['id'];?>"><button><img src="images\modifier.jpg"/></button></a></td>
    <td width="50" align="center" bgcolor="#FF0000"><a href="deletepanier.php?del_id=<?php echo $data['id'];?>"><button><img src="images\supprimer.jpg"/></button></a></td>
<?php
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
<p><h4><div style="width:auto;overflow:hidden;"><marquee behavior="alternate" direction="right">Ajouter un article, cliquer <a href="ajoutarticle.php.php"  onclick="return confirm('Voulez vous ajouter un article ?')"><button><img src="images\radar.jpeg"/></button></a></marquee></div></h4></p>
</div>
</center>
</body>
</html>