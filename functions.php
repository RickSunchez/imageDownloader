<?php
  function can_upload($file){
    if($file['name'] == '')
		return 'Вы не выбрали файл.';
	
	//проверяем размер
	if($file['size'] == 0)
		return 'Файл слишком большой.';

	// находим расширение
	$getMime = explode('.', $file['name']);
	$mime = strtolower(end($getMime));
	// допустимые расширения
	$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
	
	// проверка расширение
	if(!in_array($mime, $types))
		return 'Недопустимый тип файла.';
	
	return true;
  }
  
  function make_upload($file){	
	// случайное имя для картинки и отправка ссылки в бд
    $name = mt_rand(0, 10000) . $file['name'];
    $slash="\\";
    $named = 'images'.$slash.$name;
		$_SESSION['url'] = $named;
		//подключение к бд в файле connect.php
		require 'connect.php';
		$result = mysqli_query($link,"INSERT INTO `urls` ( `id`, `url` ) VALUES ( null, '$named' ) ");
	copy($file['tmp_name'], 'images/' . $name);
	}
	