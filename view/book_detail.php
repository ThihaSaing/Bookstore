<?php
  //session_save_path($_SERVER['DOCUMENT_ROOT']."/sessiontest/");
  require_once "include/header.php";
  require_once "include/nav.php";
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
        <!-- <h3>Code Number: <?= $result['code_number'] ?></h3> -->
        <h3>Book Name: <?= $result['bookname'] ?></h3>
        <p>Edition: <?= $result['edition'] ?></p>
        <p>Price: <?= $result['price'] ?></p>
        <p>Publishing Date: <?= $result['publishing_date'] ?></p>
        <p>Description: <?= $result['description'] ?></p>
        <!-- <p>PDF: <a href="../controller/file_read.php?pdf=<?=$result['save_pdf']?>"> <?= $result['save_pdf'] ?></a></p> -->
        <!-- <p>PDF: <a href="../pdf/<?= $result['save_pdf'] ?>"> <?= $result['save_pdf'] ?></a></p> -->
        <p>Author: <?= $result['au_name'] ?></p>
        <p>Genre: <?= $result['ge_name'] ?></p>
        <p>Publishing House: <?= $result['pu_name'] ?></p>
        <p><a href="../pdf/<?=$result['save_pdf']?>" class="btn btn-primary" role="button"download>Download</a></p>
      </div>
    </div>
  </div>
</div>
<?php require_once "include/footer.php" ?>