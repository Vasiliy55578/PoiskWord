<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ru">
	<head>
		<title>Главная</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
<br><br>
<form action="php.php" method="POST">
<h2>Введите Ключ: <input name="name" placeholder="Введите Ключ:" value="<? if( isset($znach)){ echo $znach;}?>" ></input> <button>Поиск</button></h2>
</form>
	<br><br>
	<div class="page">	
		<div class="header">
			<div class="inner">		
		
		<div class="logo" > 
		<? 
	if(( isset($znach) ) && ( $znach != '' )){
	echo "<div class='logo1' >" .$znach ."</div> ";
	echo Search($file, $znach)."<hr>";	// Вызываем функцию и передаем ей файл и ключ
	}
	else echo "Как только вы введёте ключ, здесь отобразится результат...";
	?>  
</div>
			</div>										
		</div>
	</div>	

	</body>
</html>