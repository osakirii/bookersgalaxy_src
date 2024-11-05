<?php
class Connect extends PDO{
    private static $instancia;
    private $query;
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $db = "bookersgalaxy";


    public function __construct()
    {
        parent::__construct("mysql:host=$this->host;dbname=$this->db","$this->usuario","$this->senha");
    }

    public static function getInstance()
    {
        if(!isset(self::$instancia))
        {
            try
            {
                self::$instancia = (new Connect);
            }
            catch(Exception $e)
            {
                echo'Erro ao conectar';
                exit();
            }
        }
        return self::$instancia;
    }

    public function sql($query)
    {
        $this->getInstance();
        $this->query = $query;
        $stmt = $pdo->prepare($this->query);
        $stmt->execute();
        $pdo = null;
    }

}
?>