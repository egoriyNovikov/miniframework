<?php
namespace App\Application\Controller;

class LibraryController extends ApiController 
{
  public function get(int|null $id = null) {
    if ($id) {
      $library = $this->db->fetch("SELECT * FROM `library` WHERE id = ?", [$id]);
    }else {
      $db = $this->db;
      $library = $db->fetchAll("SELECT * FROM `library`");
    }
    return $this->toJson($library);
  }

  public function post() {
    $input = file_get_contents("php://input");
    $data = json_decode($input, true);
    
    if (!$data) {
        return $this->toJson(['error' => 'Неверный JSON формат']);
    }
    
    $name = $data['name'] ?? '';
    $author = $data['author'] ?? '';
    $dt = $data['dt'] ?? '';
    
    if (empty($name) || empty($author) || empty($dt)) {
        return $this->toJson(['error' => 'Все поля обязательны']);
    }
    
    $result = $this->db->execute("INSERT INTO `library` (name, author, dt) VALUES (?, ?, ?)", [$name, $author, $dt]);
    
    if ($result) {
        $id = $this->db->lastInsertId();
        return $this->toJson(['success' => true, 'id' => $id, 'message' => 'Запись добавлена']);
    } else {
        return $this->toJson(['error' => 'Ошибка при добавлении записи']);
    }
 }

  public function put(int $id) {
    $data = json_decode(file_get_contents("php://input"), true);
    $library = $this->db->execute("UPDATE `library` SET name = ?, author = ?, dt = ? WHERE id = ?", $data);
    return $this->toJson(['success' => $library, 'message' => 'Запись обновлена']);
  }

  public function delete(int $id) {
    $library = $this->db->execute("DELETE FROM `library` WHERE id = ?", [$id]);
    return $this->toJson(['success' => $library, 'message' => 'Запись удалена']);
  }
}