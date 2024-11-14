<?php
class Connect extends PDO {
    private static $instancia;
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $db = "bookersgalaxy";

    public function __construct() {
        parent::__construct("mysql:host=$this->host;dbname=$this->db", $this->usuario, $this->senha);
    }

    public static function getInstance() {
        if (!isset(self::$instancia)) {
            try {
                self::$instancia = new Connect();
            } catch (Exception $e) {
                echo json_encode(['success' => false, 'error' => 'Erro de conexão: ' . $e->getMessage()]);
                exit();
            }
        }
        return self::$instancia;
    }

    public function sql($query) {
        try {
            $stmt = self::$instancia->prepare($query);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'error' => 'Erro ao executar a query: ' . $e->getMessage()]);
            exit();
        }
    }
}

$pdo = Connect::getInstance();
