<?php
class database
{
  private static $host = "host = 127.0.0.1";
  private static $port = "port = 5432";
  private static $dbname = "dbname = ECommerce";
  private static $credentials = "user = rohan86 password=123456";
  public static function query($query)
  {
    $db = pg_connect(self::$host." ".self::$port." ".self::$dbname." ".self::$credentials);
    pg_send_query($db,$query);
    $ret=pg_get_result($db);
    $error=pg_result_error($ret);
    if($error)
    return 'failure';
    $response=[];
    while($response[]=pg_fetch_row($ret,NULL,PGSQL_ASSOC));
    pg_close($db);
    return $response;
  }
}
class transaction 
{
  private $host; 
  private $port;
  private $dbname;
  private $credentials;
  private $db;
  public function __construct()
  {
    $this->host="host = 127.0.0.1";
    $this->port="port = 5432";
    $this->dbname="dbname = ECommerce";
    $this->credentials="user = rohan86 password=123456";
    $this->db = pg_connect($this->host." ".$this->port." ".$this->dbname." ".$this->credentials);
  }
  public function query($query)
  {
    pg_send_query($this->db,$query);
    $ret=pg_get_result($this->db);
    $error=pg_result_error($ret);
    if($error)
    return false;
    $response=[];
    while($response[]=pg_fetch_row($ret,NULL,PGSQL_ASSOC));
    return $response;
  }
  public function __destruct()
  {
    pg_close($this->db);
  }
}
?>