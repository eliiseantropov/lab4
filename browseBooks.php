<?php include("config.php"); ?>
<?php include("header.php"); ?>



 <div class="wrap">
    <h3>Search for books</h3>

            <form action="browseBooks.php" method="POST">
                <table bgcolor="#000000">
                    <tbody>
                        <tr>
                            <td>Title:</td>
                            <td><INPUT type="text" name="searchtitle"></td>
                        </tr>
                        <tr>
                            <td>Author:</td>
                            <td><INPUT type="text" name="searchauthor"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><INPUT class="style-submit" type="submit" name="submit" value="Submit"></td>
                        </tr>
                    </tbody>
                </table>
            </form>

            <h3>Book List</h3>

          <?php


           $searchtitle = "";
           $searchauthor = "";

           if (isset($_POST) && !empty($_POST)) {
           # Get data from form
           $searchtitle = trim($_POST['searchtitle']);
           $searchauthor = trim($_POST['searchauthor']);
           }



           $searchtitle = addslashes($searchtitle);
           $searchauthor = addslashes($searchauthor);

        # Open the database
          @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

          if ($db->connect_error) {
          echo "could not connect: " . $db->connect_error;
          printf("<br><a href=index.php>Return to home page </a>");
          exit();
          }
                # Build the query. Users are allowed to search on title, author, or both

                $query = " SELECT BookID, Title, Author, Onloan FROM Books";
                if ($searchtitle && !$searchauthor) { // Title search only
                   $query = $query . " where title like '%" . $searchtitle . "%'";
                }
                if (!$searchtitle && $searchauthor) { // Author search only
                   $query = $query . " where author like '%" . $searchauthor . "%'";
                }
                if ($searchtitle && $searchauthor) { // Title and Author search
                   $query = $query . " where title like '%" . $searchtitle . "%' and author like '%" . $searchauthor . "%'"; 
                }

                 #here we create a variable $id and basically say that we want the data from the array matching the search criteria
                //$id = array_search($searchtitle, array_column($books, 'title'));
                //$id = array_search($searchauthor, array_column($books, 'author'));
                
                #echo $id;

                # Here's the query using bound result parameters
                // echo "we are now using bound result parameters <br/>";
                $stmt = $db->prepare($query);
                $stmt->bind_result($BookID, $Title, $Author, $Onloan);
                $stmt->execute();

                echo '<table bgcolor="#eeeeee" cellpadding="6">';
                echo '<tr><b><td>Title</td> <td>Author</td> <td>Reserved?</td> </b> </tr>';
                while ($stmt->fetch()) {
                echo "<tr>";
                echo "<td> $Title </td><td> $Author </td><td> $Onloan </td>";
                if ($Onloan === 0) {
                  echo '<td><a href="reserveBook.php?bookid=' . urlencode($BookID) . '">
                       Reserve </a></td>';
                }
                echo "</tr>";
                }
                echo "</table>";
             ?>
      </div>     
          

<?php include("footer.php"); ?>