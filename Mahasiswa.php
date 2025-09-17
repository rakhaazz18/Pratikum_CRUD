<?php
require_once 'Database.php';

class Mahasiswa
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->conn;
    }

    public function getAll()
    {
        $result = $this->db->query("SELECT * FROM mahasiswa");
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM mahasiswa WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($nama, $nim, $jurusan)
    {
        $stmt = $this->db->prepare("INSERT INTO mahasiswa (nama, nim, jurusan) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $nim, $jurusan);
        return $stmt->execute();
    }

    public function update($id, $nama, $nim, $jurusan)
    {
        $stmt = $this->db->prepare("UPDATE mahasiswa SET nama=?, nim=?, jurusan=? WHERE id=?");
        $stmt->bind_param("sssi", $nama, $nim, $jurusan, $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM mahasiswa WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
