<?php
class Database
{
    private $conn;
    private $servername;
    private $username;
    private $password;
    const DB_NAME = 'esercizio_aeroporto';

    function __construct($servername,$username,$password)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
    }

    function get_connection()
    {
        return $this->conn;
    }

    function connect()
    {
        $this->conn = new mysqli($this->servername,$this->username,$this->password);
        if($this->conn->connect_error) {
            return false;
        }
        return true;
    }
    function connect_db()
    {
        $this->conn = new mysqli($this->servername,$this->username,$this->password,Database::DB_NAME);
        if($this->conn->connect_error) {
            return false;
        }
        return true;
    }

    function disconnect()
    {
        $this->conn->close();
    }

    function get_aereoporti() {
        if ($this->connect_db()) {
            $sql = "SELECT nome, citta, paese FROM aeroporti";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                $aeroporti = $result->fetch_all(MYSQLI_ASSOC);
                $this->disconnect();
                return $aeroporti;
            }
            return -1;
        }
        return -1;
    }
    function get_aerei() {
        if ($this->connect_db()) {
            $sql = "SELECT * FROM aerei";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                $aeroporti = $result->fetch_all(MYSQLI_ASSOC);
                $this->disconnect();
                return $aeroporti;
            }
            return -1;
        }
        return -1;
    }
    function get_voli() {
        if ($this->connect_db()) {
            $sql = "SELECT voli.cod_volo, voli.aereo, a1.nome as aeroporto_partenza, 
                    a2.nome as aeroporto_arrivo, voli.data_partenza, voli.data_arrivo, voli.ora_partenza, voli.ora_arrivo  FROM voli 
                        INNER JOIN aerei ON voli.aereo = aerei.numero_registrazione
                        INNER JOIN aeroporti a1 ON voli.aeroporto_partenza = a1.cod_aeroporto
                        INNER JOIN aeroporti a2 ON voli.aeroporto_arrivo = a2.cod_aeroporto";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                $aeroporti = $result->fetch_all(MYSQLI_ASSOC);
                $this->disconnect();
                return $aeroporti;
            }
            return -1;
        }
        return -1;
    }


}


$db = new database("localhost", "root", "");