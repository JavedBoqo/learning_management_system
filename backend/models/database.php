<?php
class Database {
	private $_server = "localhost";
	private $_db = "lms";
	private $_dbUser = "root";
	private $_dbpass = "root";//*/

	
	private static $_instance; //The single instance
	private $_connection = null;


	function __construct() {
		$this->_connection = new mysqli($this->_server, $this->_dbUser, $this->_dbpass, $this->_db);
		if(mysqli_connect_error()) {
			trigger_error("DATABASE CONNECTION FAILED: " . mysqli_connect_error(), E_USER_ERROR);
		}
	}

	/**
	 Get an instance of the Database
	 @return Instance
	 */
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function getConnection() {
		return $this->_connection;
	}


	public function setQuery($sQuery) {
		$this->query = $sQuery;
	}

	public function getQuery() {
		return $this->query;
	}

	public function executeInserQuery() {
		$db = self::getInstance();
		$mysqli = $db->getConnection();
		if($mysqli->query($this->getQuery())) return $mysqli->insert_id;
		else trigger_error("Query Not Executed: " . mysqli_connect_error(), E_USER_ERROR);
	}

	public function executeUpdateQuery() {
		$db = self::getInstance();
		$mysqli = $db->getConnection();
		if($mysqli->query($this->getQuery())) return true;
		else trigger_error("Query Not Executed: " . mysqli_connect_error(), E_USER_ERROR);
	}

	public function executeListQuery() {
		$aList = array();
		$db = self::getInstance();
		$mysqli = $db->getConnection();
		if( $aResult = $mysqli->query($this->getQuery())) {
			while ($row = $aResult->fetch_object()) {
				$aList[] = $row;
			}
		}
		else trigger_error("Query Not Executed: " . mysqli_connect_error(), E_USER_ERROR);

		return $aList;
	}
}

?>
