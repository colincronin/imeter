<?php
# Require the Connection Credentials
require 'con.php';

# Construct the bill addition class
class newconversation {
    public $date;
    public $tick;
    public $topic;

    function __construct($d,$t,$topic) {
        $this->date = $d;
        $this->tick = $t;
        if($topic==NULL) {
            $topic = 'Uncategorized';
        }
        $this->topic = $topic;
    }


    function describe() {
        echo date('F j, Y',$this->date).' ('.$this->tick.') - '.$this->topic;
    }


    function addConversation() {
        global $host;
        global $dbusername;
        global $dbpassword;
        global $dbname;
        global $tablename;

        # Open the Database Connection
        try {
            $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$dbusername, $dbpassword);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            # Prepare and Execute SQL Statements
            $stmt = $db->prepare('INSERT INTO '.$tablename.' (date, tick, topic) VALUES (:date, :tick, :topic)');
            $stmt->execute((array)$this);
        }
        catch(PDOException $e) {
            echo '<b>Error: '.$e->getMessage(). '<br></b>';
        }
        $insertId = $db->lastInsertId();

        # Display the Results
        echo $this->describe()." Inserted!<br>";
        echo "Last Insert Id: ";
        echo $insertId;

        # Close the Database Connection
        $db = NULL;
    }
}
?>
