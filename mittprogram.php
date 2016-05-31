<?php

interface iDBConnection
{
	public function programmeName();
}


class DBConnection implements iDBConnection
{
	
	private static $instance=null;
	protected static $server;
	protected static $username;
	protected static $password;
	protected static $additional;

	public function programmeName()
	{
		return __CLASS__;
	}
	
	
	private function __construct()
	{
		
		try{
			$mydatabase = "cw";//"hotel";	
			//$DB = mysql_connect(self::$server,self::$username,"") or die('error connecting to mysql');
			$DB = @mysql_connect(self::$server,self::$username,self::$password) or die('error connecting to mysql');
			mysql_select_db($mydatabase, $DB);	
		
			if (!$DB )
			{
				echo '<br>Failed to connect to ' . self::$server .":". $mydatabase .'<br>';
			}
			else
			{
				echo '<br>Succeeded to connect to server:' . self::$server ." and database: " . $mydatabase .'<br><br>';
				$instance = $DB;
			}
		}
		catch (Exception $ex )
		{
			echo "DET BLEV FEL " . $ex->getMessage();
		}
	
		
	}
	
	public static function setLoginData($dbserver, $name, $word, $add = null )
	{
		self::$server = $dbserver;//"localhost";//$name;
		self::$username = $name;//"root";
		self::$password = $word;//"";
		self::$additional = "Musse Pigg";//$add;
	}
	
	
	public static function getInstance()
	{
		if(!ISSET($instance))
		{
			self::$instance = new DBConnection();
		}
		return self::$instance;
	}
	
	public function __destruct()
	{
		echo 'Destructor called in ' . __FILE__ ;
	}
	
}

class myDBConnection extends DBConnection
{
	
	public function printOutData()
	{
		parent::printOutData();
		echo " & C:o";
	}
}

?>
	
	