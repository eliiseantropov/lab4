<?php include("config.php"); ?>
<?php include("header.php"); ?>

<div class="wrap">
<?php

include("config.php");

$bookid = trim($_GET['bookid']);    
echo '<INPUT type="hidden" name="bookid" value=' . $bookid . '>';

$bookid = trim($_GET['bookid']);      // From the hidden field
$bookid = addslashes($bookid);

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }
    
   echo "You have returned the book with id number: " . $bookid;   

    // Prepare an update statement and execute it
    $query = "UPDATE Books SET Onloan=0 WHERE BookID =" . $bookid;
    $stmt = $db->prepare($query);
    //$stmt->bind_param('i', $bookid);            
    $stmt->execute();
    printf("<br>Book returned!");
    printf("<br><a href=browseBooks.php>Search and Book more Books </a>");
    printf("<br><a href=myBooks.php>Return to Reserved Books </a>");
    printf("<br><a href=index.php>Return to home page </a>");
    exit;

?>
</div>

<?php include("footer.php"); ?>

    


