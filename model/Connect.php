<?php

class Connect
{
    private $server = 'localhost';
    private $user = 'id21520716_root';
    private $pass = 'Createnewdatabase1111.,';
    private $db = 'id21520716_kitchenpro1111';

    private $connect; // Thêm thuộc tính để lưu trữ kết nối

    public function cnt()
    {
        $connect = mysqli_connect($this->server, $this->user, $this->pass, $this->db);
        mysqli_set_charset($connect, 'utf8');

        return $connect;
    }

    public function select($sql)
    {
        $connect = $this->cnt();

        $result = mysqli_query($connect, $sql);

        mysqli_close($connect);

        return $result;
    }

    public function execute($sql): void
    {
        $connect = $this->cnt();

        mysqli_query($connect, $sql);

        mysqli_close($connect);
    }

    public function getLastInsertId()
    {
        $connect = $this->cnt();
        $sql = "SELECT * FROM donhang ORDER BY MaDonHang DESC LIMIT 1";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        
        return $row['MaDonHang'];
    }
}
