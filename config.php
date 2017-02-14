<?php
define("BASE_PATH", __DIR__);
define("ADMIN_PATH", BASE_PATH.'/on-admin');
define("MEMBER_PATH", BASE_PATH.'/on-member');
define("ASSET_PATH", BASE_PATH.'/assets');

define("BASE_URL", 'http://local.soft/inventory');
define("ADMIN_URL", BASE_URL.'/on-admin');
define("MEMBER_URL", BASE_URL.'/on-member');
define("ASSET_URL", BASE_URL.'/assets');
define("INDEX_ADMIN_URL", ADMIN_URL.'/index.php');
define("INDEX_MEMBER_URL", MEMBER_URL.'/index.php');

include BASE_PATH.'/function.php';
/**
 *
 */
class AssetTrack
{
    public static $data = array();
    public static function push($property_name, $data='')
    {
        if (!isset(self::$data[$property_name])) {
            self::$data[$property_name] = array();
        }
        self::$data[$property_name][] = $data;
    }
    public static function extract($property_name)
    {
        if (!isset(self::$data[$property_name])) {
            self::$data[$property_name] = array();
        }
        return implode("", self::$data[$property_name]);
    }
}

require BASE_PATH."/vendor/autoload.php";
use Illuminate\Database\Capsule\Manager as Capsule;

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'kp_widi');

/**
 * $dbconnect : koneksi kedatabase
 */
$dbconnect = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

/**
 * Check Error yang terjadi saat koneksi
 * jika terdapat error maka die() // stop dan tampilkan error
 */
if ($dbconnect->connect_error) {
    die('Database Not Connect. Error : ' . $dbconnect->connect_error);
}



/**
 * Configure the database and boot Eloquent
 */
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => DBHOST,
    'database'  => DBNAME,
    'username'  => DBUSER,
    'password'  => DBPASS,
    'charset'   => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => null
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$GLOBALS['capsule'] = $capsule;
// set timezone for timestamps etc
date_default_timezone_set('Asia/Jakarta');


foreach (glob(BASE_PATH.'/scheme/*.php') as $filename)
{
    require $filename;
}

$config['app_name'] = 'INVENTORY BAKTI TUNAS HUSADA';
session_start();
