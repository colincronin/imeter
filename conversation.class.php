<?php
# Construct the bill object
class conversation {
    public $id;
    public $date;
    public $tick;
    public $topic;

    function describe() {
        echo '['.$this->id.'] '.date('F j, Y',$this->date).' - ('.$this->tick.') - '.$this->topic;
    }


    function fetchAllConversations() {
        global $host;
        global $dbusername;
        global $dbpassword;
        global $dbname;
        global $tablename;

        # Open the Database Connection
        try {
            $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$dbusername, $dbpassword);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            # Fetch the data into the bill class
            $stmt = $db->query('SELECT id, date, tick, topic FROM '.$tablename);
            $fetchTotal = $stmt->rowCount();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'conversation');
            $i = 0;
            while($i<$fetchTotal-1) {
                $obj = $stmt->fetch();
                echo $obj->describe().'<br>';
                $i++;
            }
            $obj = $stmt->fetch();
            echo $obj->describe();
            echo '<br><br>';
            print_r($fetchTotal);
        }
        catch(PDOException $e) {
            echo '<b>Error: '.$e->getMessage(). '<br></b>';
        }

        # Close the Database Connection
        $db = NULL;
    }


    function fetchDates($d,$e) {
        global $host;
        global $dbusername;
        global $dbpassword;
        global $dbname;
        global $tablename;

        #Account for Single Date Argument or Negative End Date
        if($e==NULL || $e<$d) {
            $e = $d;
        }

        # Open the Database Connection
        try {
            $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$dbusername, $dbpassword);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            # Fetch the requested id
            $stmt = $db->prepare('SELECT id FROM '.$tablename.' WHERE date BETWEEN '.$db->quote($d).' AND '.$db->quote($e));
            $stmt->execute();
            $fetchDates = $stmt->fetchAll();
            $idArray = array();
            foreach($fetchDates as $key=>$value) {
                $idArray[$key] = $value['id'];
            }
            $idCount = count($idArray);
            $idArray['idCount'] = $idCount;
            return $idArray;
        }
        catch(PDOException $e) {
            echo '<b>Error: '.$e->getMessage(). '<br></b>';
        }

        # Close the Database Connection
        $db = NULL;
    }
}
?>
