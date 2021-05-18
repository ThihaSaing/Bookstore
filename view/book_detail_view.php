<?php
  //session_save_path($_SERVER['DOCUMENT_ROOT']."/sessiontest/");
  if (!isset($_SESSION)) {
    session_start();
  }
  //var_dump('hello');die();
  if ($_SESSION["logined_in"]!=true) {
    $_SESSION["error"]="Please login!";
    header("location:http://localhost/bookstore/view/user_login_view.php");
  }
  require_once "include/header.php";
  require_once "include/admin_nav.php";
  require_once "../controller/Book.php";
  $book_id=$_GET['id'];
// var_dump($book_id);die();
  $book=new Book();
  $sql=$book->get($book_id);
  $result=mysql_fetch_assoc($sql);
// var_dump($result['image']);die();
?>
<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="../images/<?= $result['image'] ?>" alt="...">
      <div class="caption">
        <h3>Code Number: <?= $result['code_number'] ?></h3>
        <p>Book Name: <?= $result['bookname'] ?></p>
        <p>Edition: <?= $result['edition'] ?></p>
        <p>Price: <?= $result['price'] ?></p>
        <p>Publishing Date: <?= $result['publishing_date'] ?></p>
        <p>Description: <?= $result['description'] ?></p>
        <!-- <p>PDF: <a href="../controller/file_read.php?pdf=<?=$result['save_pdf']?>"> <?= $result['save_pdf'] ?></a></p> -->
        <p>PDF: <a href="../pdf/<?= $result['save_pdf'] ?>"> <?= $result['save_pdf'] ?></a></p>
        <p>Author: <?= $result['au_name'] ?></p>
        <p>Genre: <?= $result['ge_name'] ?></p>
        <p>Publishing House: <?= $result['pu_name'] ?></p>
        <p><a href="book_update.php?id=<?=$result['book_id']?>" class="btn btn-primary" role="button">Update</a> 
        <a href="book_delete.php?id=<?=$result['book_id']?>" class="btn btn-default" role="button" onclick="return confirm('Are you sure to delete?');">Delete</a></p>
      </div>
    </div>
  </div>
</div>
<?php require_once "include/footer.php" ?>