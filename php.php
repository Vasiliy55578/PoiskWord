<?  
if(isset($_POST['name'])) {$namkey = $_POST['name'];	//введенное значение

		$section = file_get_contents('2_1.txt');	//получение данных с файла и занесение в переменную

for( $i = 0; $i < strlen($section); $i++ ) {

		if( $section[$i] == "=") {	
			$name[$i] = ",";
		}

		if( $section[$i] !== "=") {
			if( $section[$i] !== "[") {	
				if(trim($section[$i])){ // убрать пробелы
				$name[$i] =  $section[$i];
				}
			}
		}

	if( $section[$i] == "[") {
		do {
		$i++;
		if( $section[$i] == "]" ){	// если элемент из массива равен ]
		$section[$i] ='/';	// разделяем названия слешем
		$Str[$i] = $section[$i];
		break;	// если наткнулся на ] ломаем 
		}else{
			$Str[$i] = $section[$i];	// получаем строку с названиями в [ ]
		}

		} while ($section[$i] !== "]");
	}
}

$Str = implode($Str); // изменение массива символов в строку
$array = explode('/', $Str);	// разбиение на массив по слешу, массив из того что в [ ]

$name = implode($name); 
$name = explode(',', $name); //разбиение на массив по запятой, получение массива имен

$l1 = 0;
$v = 0;
// создание массива в паре ключ и значение - logo_part_1 => Mastering UI
for( $k = 0; $k < count($name); $k++ ) {
		if( $name[$k] == $namkey){	
			$znach[$v] = $array[$k];
			$v++;
		}
		elseif(( $name[$k] != $namkey)AND($l1 == 0)){	
			$l1 = 1;
			$znach[$k] ="undef";
		}
		
	}

	include_once "index.php"; 
	}		   
?>  
