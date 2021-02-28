<?php
// RestAPI

class ApiKeys extends PDO {

    private $table_name = NULL;

    public function __construct($config = NULL) {

        $this->table_name = strtolower(get_class($this));

        if($config == NULL) {

            echo json_encode(array(
                'Error' => 'Config is empty or missing',
            ));

            die();
        }

        try {

            parent::__construct("mysql:host=localhost;dbname=" . $config['db'], $config['user'], $config['pwd'], array(PDO::MYSQL_ATTR_INIT_COMMAND =>  "SET NAMES UTF8"));

        } catch (PDOException $e) {

            echo json_encode(array(
                'Error' => 'Db connection error: ' . $e->getMessage()
            ));

            die();
        }

        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


    }

    public function check_key($key = NULL) {

            if($key == NULL) {

                return false;

            } else {

                $key = htmlspecialchars(strip_tags($key));

            }

            try {

                $sql = "SELECT COUNT(`api_key`) AS total FROM `" . $this->table_name . "` WHERE `api_key` = :apikey AND `active` = 1";

                var_dump($sql);

                $sth = $this->prepare($sql);

                $sth->bindParam(":apikey", $key);

                $sth->execute();

                if ($sth->fetchColumn() == 1) {

                    $result=true;
                    
                } else {

                    $result=false;

                }

            } catch (PDOExeption $e) {

                echo json_encode(array(
                    'Error' => 'Db connection error: ' . $e->getMessage()
                ));
    
                die();

            }

    }

}

class Players extends PDO {

    private $table_name = NULL;


    public function __construct( $config = NULL) {

        $this->table_name = strtolower(get_class($this));

        if($config == NULL) {

            echo json_encode(array(
                'Error' => 'Config is empty or missing',
            ));

            die();
        }
        try {

            parent::__construct("mysql:host=localhost;dbname=" . $config['db'], $config['user'], $config['pwd'], array(PDO::MYSQL_ATTR_INIT_COMMAND =>  "SET NAMES UTF8"));

        } catch (PDOException $e) {

            echo json_encode(array(
                'Error' => 'Db connection error: ' . $e->getMessage()
            ));

            die();
        }

        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    }

    public function get($id = NULL, $start = null, $limit = DEFAULT_LIMIT) {

        $sql = "SELECT * FROM " . $this->table_name;

        $sth = $this->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $sth->execute();

        $result["data"] = array();

        while($row = $sth->fetch(PDO::FETCH_ASSOC)){

            extract($row);

            $item = array(
                "id" => $id,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "active" => $active,
                "age" => $age
            );

            array_push($result["data"],$item);

        }

        if(count($result) < 1) {

            return array(
                "Message" => "Nincs találat"
            );

        } else {

            return $result;

        }

        

    }


}
?>