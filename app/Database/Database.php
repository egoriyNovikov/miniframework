<?php
namespace App\Database;

use PDO;
use PDOException;
use App\Config\Config;

class Database 
{
  private static ?Database $instance = null;
  private ?PDO $connection = null;

  private function __construct() 
  {
    $this->connect();
  }

  public static function getInstance(): Database 
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  private function connect(): void 
  {
    try {
      $dbConfig = Config::get('db');
      
      if (!$dbConfig) {
        throw new PDOException("Database configuration not found");
      }

      $host = $dbConfig['MYSQL_HOST'] ?? 'db';
      $port = $dbConfig['PORT'] ?? '3306';
      $dbname = $dbConfig['MYSQL_DATABASE'] ?? 'first_weack';
      $username = $dbConfig['MYSQL_USER'] ?? 'user';
      $password = $dbConfig['MYSQL_PASSWORD'] ?? 'password';

      $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4";

      $this->connection = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
      ]);

    } catch (PDOException $e) {
      throw new PDOException("Database connection failed: " . $e->getMessage());
    }
  }

  public function getConnection(): PDO 
  {
    if ($this->connection === null) {
      $this->connect();
    }
    return $this->connection;
  }

  public function query(string $sql, array $params = []): \PDOStatement 
  {
    $stmt = $this->getConnection()->prepare($sql);
    $stmt->execute($params);
    return $stmt;
  }

  public function fetch(string $sql, array $params = []): array|false 
  {
    return $this->query($sql, $params)->fetch();
  }

  public function fetchAll(string $sql, array $params = []): array 
  {
    return $this->query($sql, $params)->fetchAll();
  }

  public function execute(string $sql, array $params = []): bool 
  {
    return $this->query($sql, $params)->rowCount() > 0;
  }

  public function lastInsertId(): string 
  {
    return $this->getConnection()->lastInsertId();
  }

  private function __clone() {}

  public function __wakeup() 
  {
    throw new \Exception("Cannot unserialize singleton");
  }
}