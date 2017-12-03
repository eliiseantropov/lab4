<?php include("config.php"); ?>
<?php include("header.php"); ?>


<div class="wrap">
<?php
 @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

          if ($db->connect_error) {
          echo "could not connect: " . $db->connect_error;
          printf("<br><a href=index.php>Return to home page </a>");
          exit();
          }

$query = " SELECT BookID, Title, Author, Onloan FROM Books";


$stmt = $db->prepare($query);
$stmt->bind_result($BookID, $Title, $Author, $Onloan);
$stmt->execute();

echo '<table bgcolor="#eeeeee" cellpadding="6">';
echo '<tr> <td>BookID</td> <td>Title</td> <td>Author</td> <td>Return</td></tr>';
while ($stmt->fetch()) {

    if ($Onloan === 1) {
     echo "<tr><td>$BookID</td> <td>$Title</td> <td>$Author</td>";
     echo '<td><a href="returnBook.php?bookid=' . urlencode($BookID) . '"> Return </a></td></tr>';

     }
    }

echo "</table>";
?>

</div>
 <?php include("footer.php"); ?>