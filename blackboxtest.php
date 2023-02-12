//connect to mysql pdo?
require 'config.php'


require 'config.php';

try {
    $dox_db = new PDO('mysql:host=localhost;dbname=test', $config['DB_USER'], $config['DB_PW']);
    var_dump($dox_db);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}


