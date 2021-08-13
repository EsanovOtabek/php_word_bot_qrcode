
<?php
$url = "";
$host = "localhost";
$user = "root";
$password = "";
$db = "db_name";
$link = mysqli_connect($host, $user, $password, $db) or die("Connection failed: " . mysqli_connect_error());
mysqli_set_charset($link, "utf8");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if (!$link) {
    echo "Xato: MySQL bilan aloqa o'rnatib bo'lmadi." . PHP_EOL;
    echo "Errno xato kodi: " . mysqli_connect_errno() . PHP_EOL;
    echo "Xatolik matni: " . mysqli_connect_error() . PHP_EOL;
    exit();
}
else{
    mysqli_set_charset($link, "utf8");
  // echo "MySQL-ga ulanish o'rnatildi!" . PHP_EOL;
  // echo "Server haqida ma'lumot: " . mysqli_get_host_info($link) . PHP_EOL;
  // exit();
}
function filter($s){
    $s = trim($s);
      $s = htmlspecialchars($s, ENT_QUOTES);
        return $s;                
    }
?>

