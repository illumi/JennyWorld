<?php
/*

    In this class we instantiate an SQL Connection object. Connection details are assinged to 
    object variabes so that they can be used when connecting to the database. The two main 
    functions are conn() and disc(). They are for connecting and disconnecting to the SQL database.

*/
class doConnect
{
    private $databasehost;
    private $databasename;
    private $databaseusername;
    private $databasepassword;

    function __construct()
    {
        $this->setRes();
        $this->conn();
    }

    function setRes()
    {
		$this->databasehost = "www2";
		$this->databasename = "js230";
		$this->databaseusername ="js230";
		$this->databasepassword = "js230";
    }

    function conn()
    {
        $con = @mysql_connect($this->databasehost,$this->databaseusername,$this->databasepassword) or die(mysql_error());
        @mysql_select_db($this->databasename) or die(mysql_error());

    }

    function disc()
    {
        mysql_close();
    }
}
?> 
