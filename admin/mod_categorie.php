<?

/*
 * Ecommerce solutions
 * Copyright (C) 2006-2100 Sandro Stracuzzi <info@persefone.it> <sandrostracuzzi@hotmail.com>
 *
 * http://www.ecommercesolutions.it
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License
 * version 2.1 as published by the Free Software Foundation.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details at
 * http://www.gnu.org/copyleft/lgpl.html
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 * Note sulla licenza:
 * E' vietato distribuire il software dietro pagamento di denaro oppure ricevere un compenso
 * per la gestione del software. Il software � personale e puoi essere distribuito solo gratuitamente.
 * L'autore del software � sandro stracuzzi e va citato insieme al sito ufficiale http://www.ecommercesolutions.it
 * in ogni pagina del sito.
 * E' severamente vietato eliminare i riferimenti all'autore o al sito web dalle pagine del sito.
 *
 * Chiunque non accetti queste note o � contrario ad esse � pregato di non utilizzare il software altrimenti
 * verr� perseguito legalmente.
 *
*/

include("../config.php");
$obj=new sast1com();
$temput=$_SESSION['temput'];
$temppass=$_SESSION['temppass'];
$id=$_GET['id'];
?>

<?if($temput==$obj->user){if($temppass==$obj->password){ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html;charset=ISO-8859-1">
<title>Cms admin</title>
</head>

<body>

<table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold">
        <tr>

                <td rowspan="2" width="80" height="64" align="center">
                                <img border="0" src="images/reparti.gif" width="48" height="48">
                </td>
                <td>
                        <table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold; border-bottom: 1px solid #D6DFF5; padding: 0">
                                <tr>
                                        <td align="left" valign="middle" style="color: #3366CC">
                                                Gestione categorie  Modifica categoria
                                        </td>
                                </tr>
                        </table>
                </td>
        </tr>
        <tr>

                <td height="10"></td>
        </tr>
</table>
<center>
<br>
<form action="mod_categorie.php" method="post">
<input type="hidden" value="mod" name="op">
<input type="hidden" value="<?echo $id?>" name="id">

  <?
  $obj->connessione();
  $dati=mysql_query("select * from categorie where id='$id'");
  $numero_righe=mysql_num_rows($dati);
  if($numero_righe>0){
  while($array=mysql_fetch_array($dati)){
    $nome=$array[nome];
  echo"Nome <input type=\"text\" value=\"$nome\" name=\"nome\">";
  }
  }else echo "Vuoto";
  ?>


<input type="submit" value="Modifica">
</form>
<br><br>


<?
if ($_POST['op']=="mod"){
$id=$_POST['id'];
$nome=$_POST['nome'];

$obj=new sast1com();
$obj->connessione();

$dati=mysql_query("update categorie set nome='$nome' where id='$id'");
if($dati) echo "cancellato correttamente";
else echo "non � stato cancellato per motivi tecnici: ".mysql_error();

echo"<script language=javascript>";
echo"document.location.href='sel_categorie.php'";
echo"</script>";
}
?>


</body></html>

<?
}}
else{
echo"<script language=javascript>";
echo"document.location.href='errore.php'";
echo"</script>";
}
?>