
<?php

echo "<style type='text/css'> th, td {width : 100px;}</style>";
// а если тоже самое только через дженерики 0_0
// 4 цикла, ну думаю уже не 10 и то хорошо, меньше из-за вывода как будто и не будет

$data = [
	['Иванов', 'Математика', 5],
	['Иванов', 'Математика', 4],
	['Иванов', 'Математика', 5],
	['Петров', 'Математика', 5],
	['Сидоров', 'Физика', 4],
	['Иванов', 'Физика', 4],
	['Петров', 'ОБЖ', 4],
];

$students = [];// [имя => [предмет => баллы] (удобненько для вывода)];
$subjects = [];// [все предметы (надо для сортировки и в большей степени для вывода)]

create_stud_and_sub($data, $students, $subjects); // заполнение массивов $students и $subjects из $data
sort($subjects); // сортировка предметов
ksort($students); // сортировка студентов по именам


stud_to_table($students, $subjects); // вывод данных в формате таблицы










function stud_to_table(array &$students, array &$subjects){
	echo "<table border = '1' cellpadding = '10' cellspacing = '0'  align = 'center'>
<thead >
    <tr>
    <th></th>";
    foreach($subjects as $subject){ // вывод предметов
     	echo "<th>{$subject}</th>";
     } 

echo "</tr>
  </thead>
  <tbody>";

  foreach($students as $name => $subjectsRating){ //вывод имени студента и его баллов
		echo "<tr>";
		echo "<td>{$name}</td>";

		foreach ($subjects as $key) { 
			$rating = ""; // баллы

			if(isset($subjectsRating[$key])){ // провекра стоят ли баллы по предмету
				$rating = $subjectsRating[$key];
			}

			echo "<td>{$rating}</td>";
		}

	echo "</tr>";
}

echo "</tbody>
</table>";
}

function create_stud_and_sub(array &$data, array &$students, array &$subjects){

	foreach ($data as $subData) {
		if(!in_array($subData[1], $subjects)) // создание массива предметов
			$subjects[] = $subData[1];

		if(isset($students[$subData[0]][$subData[1]])) // создание массива студентов по вышеописанному шаблону ([имя => [предмет => баллы])
			$students[$subData[0]][$subData[1]] += $subData[2];
		else
			$students[$subData[0]][$subData[1]] = $subData[2];
	}
}

//echo "<p align = 'center'><a aling ='center' href='../task2/'> Next task (2) </a></p>";