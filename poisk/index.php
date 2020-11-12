<? 		
	if(isset($_POST['name'])) {
		$znach = $_POST['name'];	// если POST установлен, заносим в переменную
		define('ROOT', dirname(__FILE__));	
		$file = ROOT."/2_1.txt";	
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ru">
	<head>
		<title>Главная</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
<br><br>
<form action="index.php" method="POST">
<h2>Введите Ключ: <input name="name" type="number" placeholder="от 1 до n: " value="<? if( isset($znach)){ echo $znach;}?>" ></input> <button>Поиск</button></h2>
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
	else {	echo "Как только вы введёте ключ, здесь отобразится результат..."; }	
	?>  
				</div>
			</div>										
		</div>
	</div>	
<?
	function Search ($file, $znach){	//функция поиска передаются две переменные, файл и ключ
		$handle = fopen($file, "r");	
		while (!feof($handle)) {		// пока корретка не достигнет конца файла
			$string = fgets($handle);
			mb_convert_encoding($string, 'cp1251');	
			$explodedstring = explode('\x0A', $string);	// разбиваем на массив
			array_pop($explodedstring);	// последний элемент пустой, он нам не нужен
			foreach($explodedstring as $key => $value) {	// разбить массив на ключ и значение 
				$arr[] = explode('\t', $value);	// explode - первый переданный параметр \t разбивает на массив
			}
			$start = 0;
			$end = count($arr) - 1;
			while ($start <= $end) {		//бинарный поиск
				$middle = floor(($start + $end) / 2);	
				$strnatcmp = strnatcmp($arr[$middle][0], $znach);
				if ($strnatcmp > 0) {
					$end = $middle - 1;
				} else if ($strnatcmp < 0) {
					$start = $middle + 1;
				} else {
					return $arr[$middle][1];
				}
			}
		}
		return 'undef';
	}
?>
	</body>
</html>
