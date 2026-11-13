<?php

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "yudha123";
    private $database = "db_kaskita";

    public function connect()
    {
        $conn = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );

        if ($conn->connect_error) {
            die("Koneksi database gagal: " . $conn->connect_error);
        }

        return $conn;
    }
}