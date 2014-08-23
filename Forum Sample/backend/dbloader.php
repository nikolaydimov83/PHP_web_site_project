<?php
// These are constants 
define("DB_HOST", $_SERVER['HTTP_HOST'] );
define("DB_USERNAME", "");
define("DB_PASSWORD", "");
class DatabaseGetter
{
    protected $host = 'localhost'; // Host name 
    protected $username = DB_USERNAME; // MYSQL UNAME
    protected $password = DB_PASSWORD; // MYSQL PW 

    protected $db_name; 
    static $con;
    protected $class_name = null;

    public function __construct($dbname, $class_name="DatabaseGetter"){
        $this->db_name = "$dbname"; // Sets the name of the DB - called on class construction. You need multiple of these to open different databases.
        $this->con = new mysqli();
    }

    //The values that are initialized do not need to be passed in when the function is called.
    public function GetTable($table, $order="DESC"){        
        // Connects the the MySQL Server
        $this->con->real_connect("$this->host", "$this->username", "$this->password", "$this->db_name") or die("error:".mysqli_connect_error()); 
        if($this->con->connect_errno > 0){
            die('Unable to connect to database['. $this->con->connect_error(). ']');
        }
        //Sets the query so that when the query is executed it returns every value from the specified tabled ordered by ID;
        $query = "SELECT * FROM $table ORDER BY id $order";
        //Executes the query and returns the result
        $result = mysqli_query($this->con, $query) or die("Wrong String!");
        return $result;
        
    }
    public function GetData($table, $row){
        $this->con->connect() or die("Cannot connect to DB");
        // Selects a specific from specified table and returns it.
        $query = "SELECT * FROM $table WHERE id='$row'";
        return $this->con->query($query) or die("Wrong String!");
        $this->con->close();
    }
    public function FindData($table, $parameter, $parameterValue, $order="DESC"){
        $this->con->connect() or die("Cannot connect to DB");
        $query = "SELECT * FROM $table WHERE $parameter='$parameterValue' BY $order";
        return $this->con->query($query) or die("Wrong String!");
        $this->con->close();
    }
    public function UpdateData($table, $row, $parameter, $newvalue){
        $this->con->connect() or die("Cannot connect to DB");
        $query = "UPDATE $table SET $parameter='$newvalue' WHERE id='$row'";
        $this->con->close();
    }
    public function AddData($table, $data=array()){
        $this->con->connect() or die("Cannot connect to DB");
        $query = "INSERT INTO $table VALUES $data";
        $this->con->close();   
    }
}
$thing = new DatabaseGetter("test");
var_dump($thing->GetTable('forum_question'));