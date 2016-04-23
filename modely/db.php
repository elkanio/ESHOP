<?php
//Třídá pro snadnější práci s databází
class db
{
	private static $dbPripojeni;
    private static $error;
    private static $sql;
    private static $bind;
    private static $errorCallbackFunction;
    private static $errorMsgFormat;

	public static function pripoj ($adresa) {
        if(!isset(self::$dbPripojeni)){
            self::$dbPripojeni = new PDO("sqlite:$adresa"); 
            self::$dbPripojeni->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            
            
        }
                       
   }
   #Mozna nefunguje s ostatnimi funkcemi
   public static function pripojMySQL ($host, $uzivatel, $heslo, $databaze) {
        if(!isset(self::$dbPripojeni)){
            
                self::$dbPripojeni = new PDO("mysql:host=$host;dbname=$databaze",$uzivatel,$heslo);
                
        }
                      
   }
    public static function VratVse($dotaz, $param = array()) {
    	$data = self::$dbPripojeni->prepare($dotaz);
    	$data->execute($param);
        return $data->fetchAll();
    }
    public static function VratRadek($dotaz, $param = array()) {
        $data = self::$dbPripojeni->prepare($dotaz);
        $data->execute($param);
        return $data->fetch();
    }
    public static function Udelej($dotaz, $param = array()) {
        $q = self::$dbPripojeni->prepare($dotaz);
        $q->execute($param);
        return $q;
    }
    public static function Vloz($tabulka, array $hodnoty) {
        $fields = self::filter($tabulka, $hodnoty);
        $sql = "INSERT INTO " . $tabulka . " (" . implode($fields, ", ") . ") VALUES (:" . implode($fields, ", :") . ");";
        $bind = array();
        foreach($fields as $field)
            $bind[":$field"] = $hodnoty[$field];
        return self::run($sql, $bind);
    }
    #Další část je předělaná z http://www.imavex.com/php-pdo-wrapper-class/#project-overview kvůli předělávání na MySQL
    private static function filter($table, $info) {
        $driver = self::$dbPripojeni->getAttribute(PDO::ATTR_DRIVER_NAME);
        if($driver == 'sqlite') {
            $sql = "PRAGMA table_info('" . $table . "');";
            $key = "name";
        }
        elseif($driver == 'mysql') {
            $sql = "DESCRIBE " . $table . ";";
            $key = "Field";
        }
        else {  
            $sql = "SELECT column_name FROM information_schema.columns WHERE table_name = '" . $table . "';";
            $key = "column_name";
        }   

        if(false !== ($list = self::run($sql))) {
            $fields = array();
            foreach($list as $record)
                $fields[] = $record[$key];
            return array_values(array_intersect($fields, array_keys($info)));
        }
        return array();
    }
    public static function run($sql, $bind="") {
        self::$sql = trim($sql);
        self::$bind = self::cleanup($bind);
        self::$error = "";

        try {
            $pdostmt = self::$dbPripojeni->prepare(self::$sql);
            if($pdostmt->execute(self::$bind) !== false) {
                if(preg_match("/^(" . implode("|", array("select", "describe", "pragma")) . ") /i", self::$sql))
                    return $pdostmt->fetchAll(PDO::FETCH_ASSOC);
                elseif(preg_match("/^(" . implode("|", array("delete", "insert", "update")) . ") /i", self::$sql))
                    return $pdostmt->rowCount();
            }   
        } catch (PDOException $e) {
            return false;
        }
    }
    private static function cleanup($bind) {
        if(!is_array($bind)) {
            if(!empty($bind))
                $bind = array($bind);
            else
                $bind = array();
        }
        return $bind;
    }
}