<?php
$text = <<<TXT
<p class="big">
	Год основания:<b>1589 г.</b> Волгоград отмечает день города в <b>2-е воскресенье сентября</b>. <br>В <b>2023 году</b> эта дата - <b>10 сентября</b>.
</p>
<p class="float">
	<img src="https://www.calend.ru/img/content_events/i0/961.jpg" alt="Волгоград" width="300" height="200" itemprop="image">
	<span class="caption gray">Скульптура «Родина-мать зовет!» входит в число семи чудес России (Фото: Art Konovalov, по лицензии shutterstock.com)</span>
</p>
<p>
	<i><b>Великая Отечественная война в истории города</b></i></p><p><i>Важнейшей операцией Советской Армии в Великой Отечественной войне стала <a href="https://www.calend.ru/holidays/0/0/1869/">Сталинградская битва</a> (17.07.1942 - 02.02.1943). Целью боевых действий советских войск являлись оборона  Сталинграда и разгром действовавшей на сталинградском направлении группировки противника. Победа советских войск в Сталинградской битве имела решающее значение для победы Советского Союза в Великой Отечественной войне.</i>
</p>
TXT;

$tags = []; //массив тегов (нужен для восстановления тегов)
$single_tags = ['img', 'br']; // теги которые не надо закрывать

$text_proc = create_tags_and_text($text, $tags, $single_tags, 29); 
$brocken_tags = find_brocken_tags($tags);

$text_proc = add_closing_tags($text_proc, $brocken_tags);


echo $text_proc;

function add_closing_tags($text, $tags){
	for($i = count($tags) - 1; $i >= 0; $i--){ // теги закрываются в обратном порядке
	$text .= "</{$tags[$i]}>";
	}

	return $text;
}

function create_tags_and_text($text, &$tags, $single_tags, $word_limit){
	$words_seprs = [' ', ':', ]; //разделители между словами
	$test_resut = "";
	$is_in_tag = false; // индекатор нахождения внутри тега
	$words_count = 0;

	for($i = 0; $i < strlen($text); $i++){ // формирования желаемого текста с сохранением форматирования 


		if($text[$i] == '>') // встретил закрывающий знак ты вне тега
			$is_in_tag = false;

		if($text[$i] == '<'){ // встретил открывающий знак ты внутри тега

			$tag = "";

			$is_in_tag = true;


			for($k = $i + 1; !in_array($text[$k], [' ', '>']); $k++){ //формирование тега
				$tag .= $text[$k];
			}

			if(!in_array($tag, $single_tags))// если тег неодиночный добавляем (его же потом закрыть надо)
				$tags[] = $tag;

		}

		$test_resut .= $text[$i];

		if(!$is_in_tag && in_array($text[$i], $words_seprs)) // считаем слова только снаруже тегов
			$words_count++;

		if($words_count == $word_limit - 1){ //28 ибо подсчет слов по разделителям типа (слово разд. слово . разд слово) слов всегда будет разд + 1;
			$test_resut .= "...";
			break;
		}
	} 
	
	return $test_resut;
}

function find_brocken_tags(array $tags){ // нахождение открывающих тегов у которых нет закрывающих
	$i = 0;

	for(; $i < count($tags) - 1; $i++){

		if(!str_contains($tags[$i], '/') && strcmp($tags[$i + 1], "/" . $tags[$i]) == 0){ // если сосед спарава закрывающий то удаляем их из массива, 
																													// чтобы остались лишь беспарные

			unset($tags[$i]);
			unset($tags[$i + 1]);
			$tags = array_values($tags);

			$i = -1;


		}
	}

	return $tags;
}