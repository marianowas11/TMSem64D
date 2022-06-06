<?php
 require_once('dbConn.php');
echo "ID|===|&nbsp;&nbsp; Data |===| &nbsp;&nbsp;&nbsp;&nbsp; Image|===|  Message  |===|User";

$sql = "Select * from messages Order by idk Desc Limit 5";
$result = $connection->query($sql);
if($result->num_rows>0){
while ($row = $result -> fetch_assoc()){
echo "<div style = 'border:1'>";
if(is_null($row["image"])){
echo $row["idk"] ."|===|" ;
echo $row["datetime"] ."|===|";
if (is_null($row["image"]))
echo $row["image"];
else
echo $row["image"]."|===|";
if (is_null($row["message"]))
{echo $row["message"];}
else
{echo $row["message"]."|===|";}
echo $row["user"];
}
else
{
    $format = pathinfo($row["image"], PATHINFO_EXTENSION);

    echo $row["idk"] ."|===|" ;
    echo $row["datetime"] ."|===|";
    if (is_null($row["image"]))
    echo $row["image"];
    else
    echo $format."|===|";
    if (is_null($row["message"]))
    {echo $row["message"];}
    else
    {echo $row["message"]."|===|";}
    echo $row["user"];
    

}
echo "</div>";

}
}
else
{
    echo "0 results";
}
$connection->close();
?>