<!DOCTYPE>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="elements.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <title>Book club</title>
</head>
<body>

  <header>
   <div class="wrap">
   <h1>Book club</h1>
   <nav>
     <ul id="topmenu">
      <li><a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php">Home</a> </li>
      <li><a class="<?php echo ($current_page == 'aboutUs.php' || $current_page == '') ? 'active' : NULL ?>" href="aboutUs.php">About us</a></li>
      <li><a class="<?php echo ($current_page == 'browseBooks.php' || $current_page == '') ? 'active' : NULL ?>" href="browseBooks.php">Browse Books</a></li>
      <li><a class="<?php echo ($current_page == 'myBooks.php' || $current_page == '') ? 'active' : NULL ?>" href="myBooks.php">My books</a></li>
      <li><a class="<?php echo ($current_page == 'gallery.php' || $current_page == '') ? 'active' : NULL ?>" href="gallery.php">Gallery</a></li>
      <li><a class="<?php echo ($current_page == 'contact.php' || $current_page == '') ? 'active' : NULL ?>" href="contact.php">Contact</a></li>
     </ul>
   </nav>
   </div>
  </header>
