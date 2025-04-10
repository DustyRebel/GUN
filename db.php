<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>База данных</title>
</head>
<body BGCOLOR="#CCCCFF" TEXT="#0000FF" LEFTMARGIN="3" LINK="#000000" VLINK="#000000">
<center>
<h1>База данных авто</h1>
<?php
#$SQL = "SELECT magazine.id,lastname,name,marka,model,quantity from cars,client,magazine where cars.id=id_car and client.id=id_lastname";
$SQL="SELECT id,marka from cars";
#,magazine where id_lastname=client.id and id_car=cars.id and id_marka=marka_id";
#if($_POST['poisk']) {$SQL.=" and marka='$poisk'";}

$mysqli = mysqli_connect('localhost', 'user101','gun_fedora_user_101','user101');
if (!$mysqli) { echo "Can't connect to database!"; exit;}
#@$db=mysqli_select_db($cn, "test_db");
#if (!$db) { echo "Can't change database!"; exit;}
$result=mysqli_query($mysqli, "SELECT * from cars");
$nf=mysqli_field_count($mysqli);
echo "<table border=1>";
$fields=mysqli_fetch_fields($result);
  foreach ($fields as $value)
      {
              echo "<th>".$value->name."<br> ";
    }
while ($row=mysqli_fetch_row($result))
#$row=mysqli_fetch_assoc($result);
{
    echo "<tr>";
    for ($i=0; $i<$nf; $i++)
    {
        echo "<td>".$row[$i]."</td>"; //<td>".$row[1]."</td>";
    }
    echo "</tr>";
}
echo "</table>";

#$nr=mysqli_num_rows($ss);
#$nf=mysqli_num_fields($ss);
#echo $nr, $nf;
?>
</body>
</html>
