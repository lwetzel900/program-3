<?php include 'view/header.php'; ?>
<main>
    this is admin work
    <br><br>
    <form action="index.php" method="POST" enctype="multipart/form-data" id="aligned">
         <input type="hidden" name="action" value="uploadImage"/>
         <input type="file" name="image" /><br>
         <input type="submit"/>
      </form>
    <br><br>
</main>

<?php include 'view/footer.php'; ?>
