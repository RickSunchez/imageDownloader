<?php
session_start();
$named = $_SESSION['url'];
  include_once('functions.php')
?>

<!DOCTYPE html>
<html>
  <head>
  <style>
  </style>
    <meta charset="utf-8">
    <title>Загрузка изображений на сервер</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="stul.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>

  <div class="main">
    <div class="card_image">
    <?php
    // проверяем наличие  
    if(isset($_FILES['file'])) {
      // проверка изображения
      $check = can_upload($_FILES['file']);
    
      if($check === true){
        // загружаем
        make_upload($_FILES['file']);
      }
      else{
        echo "<p>$check</p>";  
      }
    }
    echo"
    <img class='image_is' src = '".$named."'>
    </div>
    <div class='otoidi'>
    <p class='centatext'>Путь к файлу на сервере:  ".$named."</p>
    "; ?>
      <form method="post" enctype="multipart/form-data">
              <div class="example-2">
                <div class="form-group">
                  <input type="file" name="file" id="file" class="input-file">
                  <label for="file" class="btn btn-tertiary js-labelFile">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">Выбрать файл</span>
                  </label>
                </div>
              </div>

              
            <input type="submit" value="Загрузить файл" class="btn bth_frez">
        </form>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>