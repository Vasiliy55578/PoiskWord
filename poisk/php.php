<?  
if(isset($_POST['name'])) {
		$znach = $_POST['name'];	//введенный ключ

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
	define('ROOT', dirname(__FILE__));	
	$file = ROOT."/2_1.txt";
	include_once "index.php"; 
	}		   
?>  
