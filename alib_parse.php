<meta charset="UTF-8">
<style>
    .main_table {width:100%;border:0;border-collapse:collapse;}
    .main_table tr:nth-child(2n+1) {background: #e4d8e8;}
    .main_table th {font-weight:bold;text-align: left;}
    .main_table td, .main_table th {padding:10px 20px;}
    .main_table td:last-child {text-align:center;}
    .search_wrap {width:100%;max-width:980px;margin:10px auto;}
    .search_title {text-align:center;text-transform:uppercase;color:#7e7e7e;;font-weight:bold;margin:20px;}
</style>
<?
error_reporting(E_ALL);
ini_set('display_errors', 1);
setlocale(LC_ALL, 'ru_RU');
date_default_timezone_set('Europe/Moscow');
$search_data = array(
    /*'Зощенко (Нервные люди)' => 'title=%ED%E5%F0%E2%ED%FB%E5+%EB%FE%E4%E8',
    'Мелвилл' => 'author=%EC%E5%EB%E2%E8%EB%EB',
    'Вудхауз' => 'author=%E2%F3%E4%F5%E0%F3%E7',
    'Бронзино' => 'title=%E1%F0%EE%ED%E7%E8%ED%EE',
    'Милютин - Воспоминания' => 'author=%EC%E8%EB%FE%F2%E8%ED&title=%E2%EE%F1%EF%EE%EC%E8%ED%E0%ED%E8%FF',
    'Гордон - Дневник' => 'author=%E3%EE%F0%E4%EE%ED&title=%E4%ED%E5%E2%ED%E8%EA',
    'Фабрика литературы' => 'title=%F4%E0%E1%F0%E8%EA%E0+%EB%E8%F2%E5%F0%E0%F2%F3%F0%FB',
    'Дураки на периферии' => 'title=%E4%F3%F0%E0%EA%E8+%ED%E0+%EF%E5%F0%E8%F4%E5%F0%E8%E8',
    'Шестимиров' => 'author=%F8%E5%F1%F2%E8%EC%E8%F0%EE%E2',
    'Утамаро' => 'title=%F3%F2%E0%EC%E0%F0%EE',*/
    'Шестимиров' => 'author=%F8%E5%F1%F2%E8%EC%E8%F0%EE%E2+',
    'Утамаро' => 'title=%F3%F2%E0%EC%E0%F0%EE+',
    'Горы воды' => 'title=%E3%EE%F0%FB+%E2%EE%E4%FB',
    'Уильям Бугро' => 'title=%F3%E8%EB%FC%FF%EC+%E1%F3%E3%F0%EE',
    'Нагибин (Москвоская книга)' => 'author=%ED%E0%E3%E8%E1%E8%ED+&title=%EC%EE%F1%EA%E2%EE%E2%F1%EA%E0%FF+%EA%ED%E8%E3%E0+',
    'Клайв Стейплз Льюис, восьмитомник' => 'author=%EB%FC%FE%E8%F1&izdat=%CC%E5%ED%FF+',
    'Сказки и мифы народов востока' => 'seria=%F1%EA%E0%E7%EA%E8+%E8+%EC%E8%F4%FB+%ED%E0%F0%EE%E4%EE%E2+%E2%EE%F1%F2%EE%EA%E0+&god1=1994&god2=2008',
    'Памятники письменности востока' => 'seria=%EF%E0%EC%FF%F2%ED%E8%EA%E8+%EF%E8%F1%FC%EC%E5%ED%ED%EE%F1%F2%E8+%E2%EE%F1%F2%EE%EA%E0',
    /*'Шедевры фантастики' => 'seria=%F8%E5%E4%E5%E2%F0%FB+%F4%E0%ED%F2%E0%F1%F2%E8%EA%E8',
    'Библиотека поэта' => 'seria=%E1%E8%E1%EB%E8%EE%F2%E5%EA%E0+%EF%EE%FD%F2%E0',
    'Научно-биографическая литература' => 'seria=%ED%E0%F3%F7%ED%EE+%E1%E8%EE%E3%F0%E0%F4%E8%F7%E5%F1%EA%E0%FF',
    'Литературные памятники' => 'seria=%EB%E8%F2%E5%F0%E0%F2%F3%F0%ED%FB%E5+%EF%E0%EC%FF%F2%ED%E8%EA%E8',
    'Мастера живописи (Белый город)' => 'seria=%EC%E0%F1%F2%E5%F0%E0+%E6%E8%E2%EE%EF%E8%F1%E8+&izdat=%E1%E5%EB%FB%E9+%E3%EE%F0%EE%E4',
    'ЖЗЛ' => 'seria=%E6%E8%E7%ED%FC+%E7%E0%EC%E5%F7%E0%F2%E5%EB%FC%ED%FB%F5+%EB%FE%E4%E5%E9',*/
);
require_once 'phpQuery/phpQuery.php';
foreach ($search_data as $k_search => $v_search){

    $base = 'https://www.alib.ru/findp.php4?'.$v_search.'&sortby=8&lday=50';

    /*$curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_HEADER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_URL, $base);
    curl_setopt($curl, CURLOPT_REFERER, $base);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36");
    $parsing_data = curl_exec($curl);
    curl_close($curl);
    $doc = phpQuery::newDocument($parsing_data);*/

    $doc = phpQuery::newDocument(file_get_contents($base));
    $new_books = array();
    $price_pattern = '/^.*Цена\:\s(\d+)\s.*/s';
    foreach($doc->find('p') as $value){
        $pqP = pq($value);
        preg_match($price_pattern, serialize($pqP->text()), $matches);
        $bookseller = $pqP->find("a")->attr("href");
        $bookname = $pqP->find("b:first")->text();
        if($matches) {$bookprice = $matches[1];} else {$bookprice=0;}
        $new_books[] = array("name" => $bookname,"price" => $bookprice,"bookseller" => $bookseller);
    }
    $new_books = array_slice($new_books, 5, count($new_books)-12);
    if (!empty($new_books)){
        echo '<div class="search_wrap"><div class="search_title">'.$k_search.'</div>';
        echo '<table class="main_table"><tr><th>Автор + Название</th><th width="300">Продавец</th><th width="100">Цена, <i>руб.</i></th></tr>';
        foreach($new_books as $k => $v){echo '<tr><td>'.$v["name"].'</td><td><a href="'.$v["bookseller"].'" target="_blank">'.$v["bookseller"].'</a></td><td>'.$v["price"].'</td></tr>';}
        echo '</table></div>';
    }
}
?>