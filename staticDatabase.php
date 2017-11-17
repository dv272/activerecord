<?php


ini_set('display_errors', 'On');
error_reporting(E_ALL);
define('DATABASE', 'dv272');
define('USERNAME', 'dv272');
define('PASSWORD', '6BURYkJzE');
define('CONNECTION', 'sql1.njit.edu');

class dbConn{
    //variable to hold connection object.
    protected static $db;
    //private construct - class cannot be instatiated externally.
    private function __construct() {
        try {
            // assign PDO object to db variable
            self::$db = new PDO('mysql:host='.CONNECTION.';dbname='.DATABASE,USERNAME,PASSWORD);
            self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch (PDOException $e) {
            //Output error - would normally log this to error file rather than output to user.
            echo "Connection Error: " . $e->getMessage();
        }
    }
    // get connection function. Static method - accessible without instantiation
    public static function getConnection() {
        //Guarantees single instance, if no connection object exists then create one.
        if (!self::$db) {
            //new connection object.
            new dbConn();
        }
        //return connection.
        return self::$db;
    }
}

class collection {
    static public function create() {
      $model = new static::$modelName;
      return $model;
    }
    static public function findAll() {
        $db = dbConn::getConnection();
        $tableName = get_called_class();
        $sql = 'SELECT * FROM ' . $tableName;
        $statement = $db->prepare($sql);
        $statement->execute();
        $class = static::$modelName;
        $statement->setFetchMode(PDO::FETCH_CLASS, $class);
        $recordsSet =  $statement->fetchAll();
        return $recordsSet;
    }
    static public function findOne($id) {
        $db = dbConn::getConnection();
        $tableName = get_called_class();
        $sql = 'SELECT * FROM ' . $tableName . ' WHERE id =' . $id;
        $statement = $db->prepare($sql);
        $statement->execute();
        $class = static::$modelName;
        $statement->setFetchMode(PDO::FETCH_CLASS, $class);
        $recordsSet =  $statement->fetchAll();
        return $recordsSet[0];
    }
}

class accounts extends collection {
    protected static $modelName = 'account';
}

class todos extends collection {
    protected static $modelName = 'todo';
}

class model {
    protected $tableName;
    public function save()
    {
    	
        $array = get_object_vars($this);
        $tempId = $array['id'];
        array_pop($array);
        array_shift($array);
        $columnString = implode(',', array_keys($array));
        $valueString = ":".implode(',:', array_keys($array));
        
        if ($this->id == '') {
            $sql = $this->insert($columnString, $valueString);
            echo '<h1>In insert</h1>';
        } else {
            $sql = $this->update();
        }
        
        $db = dbConn::getConnection();
        $statement = $db->prepare($sql);
        $statement->execute(array('owneremail'=>$this->owneremail,
            				'ownerid'=>$this->ownerid, 'createddate'=>$this->createddate,
            				'duedate'=>$this->duedate, 'message'=>$this->message, 
            				'isdone'=>$this->isdone));
        //echo "INSERT INTO ".$this->tableName." (" . $columnString . ") VALUES (" . $valueString . ")</br>";
        echo 'I just saved record with id: ' . $this->id .'<br>';
    }
    private function insert($columnString, $valueString) {
        $sql = "INSERT INTO ".$this->tableName." (" . $columnString . ") VALUES (" . $valueString . ")";
        echo $sql;
        return $sql;
    }
    private function update() {
        $sql = 'UPDATE '.$this->tableName.' 
        		SET owneremail=:owneremail,
        			ownerid=:ownerid,
        			createddate=:createddate,
        			duedate=:duedate,
        			message=:message,
        			isdone=:isdone
        		WHERE id='.$this->id;
        			
        echo 'I just updated record with id: ' . $this->id .'<br>';
        return $sql;
    }
    public function delete() {
        $db = dbConn::getConnection();
    	$sql = 'DELETE FROM '.$this->tableName.' WHERE id='.$this->id;
    	$stmt = $db->prepare($sql);
    	$stmt->execute();
        echo 'I just deleted record: ' . $this->id .'<br>';
    }
}

class account extends model {
}

class todo extends model {
    public $id;
    public $owneremail;
    public $ownerid;
    public $createddate;
    public $duedate;
    public $message;
    public $isdone;
    public function __construct()
    {
        $this->tableName = 'todos';
	
    }
}


?>



