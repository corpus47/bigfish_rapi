<?php
// RestAPI

class Players extends PDO {

    private $table_name = "Players";


    public function __construct( $config = NULL) {

        if($config == NULL) {

            echo json_encode(['Message' => "Config is empty or missing!"]);

            die();
        }
        try {

            parent::__construct("mysql:host=localhost;dbname=" . $config['db'], $config['user'], $config['pwd'], array(PDO::MYSQL_ATTR_INIT_COMMAND =>  "SET NAMES UTF8"));

        } catch (PDOException $e) {

            echo json_encode(['Message' => 'Db connection error: ' . $e->getMessage()]);

            die();
        }

        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    }


}
?>