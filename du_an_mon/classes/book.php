<?php
  class Book {
    protected $id;
    protected $title;
    protected $description;
    protected $author;
    protected $imagefile;

    public function __construct($title, $description, $author, $imagefile) {
      $this->title = $title;
      $this->description = $description;
      $this->author = $author;
      $this->imagefile = $imagefile;
    }

    private function validate() {
      return $this->title 
              && $this->description 
              && $this->author;
    }

    public function addBook($conn) {
      if ($this->validate()) {
        // Write sql querry
        $sql = "insert into books (title, description, author, imagefile) 
                  values (:title,:description,:author,:imagefile);";
        
        // Prepare connection
        $stmt = $conn->prepare($sql);

        // Refence to each value
        $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
        $stmt->bindValue(':author', $this->author, PDO::PARAM_STR);
        $stmt->bindValue(':imagefile', $this->imagefile, PDO::PARAM_STR);
        
        return $stmt->execute();
      } else {
        return false;
      }
    }
    public function getAllBooks($conn) {
      try {
        $sql = "select * from books";
        $stmt = $conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
        if ($stmt->execute()) {
          $books = $stmt->fetchAll();
          return $books;
        }
      } catch (PDOException $e) {
        echo $e->getMessage();
        return null;
      }

    }

    public function getBookById($conn, $id) {
      try {
        $sql = "select * from books where id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
        if ($stmt->execute()) {
          $book = $stmt->fetch();
          return $book;
        }
      } catch (PDOException $e) {
        echo $e->getMessage();
        return null;
      }
    }

    public static function getPagingBooks($conn, $limit, $offset) {
      try {
        $sql = "select * from books order by title asc
                limit :limit
                offset :offset";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
        if ($stmt->execute()) {
          $books = $stmt->fetchAll();
          return $books;
        }
      } catch (PDOException $e) {
        echo $e->getMessage();
        return null;
      }
    }

    public function update($conn) {
      try {
        $sql = "update books
                set title=:title, description=:description,
                    author=:author, imagefile=:imagefile
                where id=:id;";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
        $stmt->bindValue(':author', $this->author, PDO::PARAM_STR);
        $stmt->bindValue(':imagefile', $this->imagefile, PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
        if ($stmt->execute()) {
          $book = $stmt->fetch();
          return $book;
        }
      } catch (PDOException $e) {
        echo $e->getMessage();
        return null;
      }
    }

    public function delete() {
      
    }

    public function deleteBookByID($conn, $id) {
      try {
        $sql = "delete from books where id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
          return true;
        }
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public function updateImageBook($conn, $id, $imagefile) {
      try {
        $sql = "update books
                set imagefile=:imagefile
                where id=:id;";
        $stmt = $conn->prepare($sql);
        // $imagefile may be null
        $stmt->bindValue(':imagefile', $imagefile, 
                          $imagefile == null ? PDO::PARAM_NULL : PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
          return true;
        }
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }

    public static function count($conn) {
      try {
        $sql = "select count(id) from books";
        return $conn->query($sql)->fetchColumn();
       
      } catch (PDOException $e) {
        echo $e->getMessage();
        return -1;
      }
    }
  }
?>