<?php
	class Category {
		public $id = null;
		public $name = null;
		public $description = null;

		public function __construct($data = array()) {
			if(isset($data['id'])) $this->id = (int)$data['id'];
			if(isset($data['name'])) $this->name = preg_replace( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['name']);
			if(isset($data['description'])) $this->description = preg_replace( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['description']);
		}

		public function storeFormValues($param) {
			$this->__construct($params);
		}

		public static function getById($id) {
			$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			$sql = "SELECT * FROM categories WHERE id = :id";
			$st = $conn->prepare($sql);
			$st->bindValue(":id", $id, PDO::PARAM_INT);
			$st->execute();
			$row = $st->fetch();
			$conn = null;
			if($row) return new Category($row);
		}

		public static function getList($numRows = 100000, $order="name ASC") {
			$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM categories ORDER BY " . $order . " LIMIT :numRows";
			$st = $conn->prepare($sql);
			$st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
			$st->execute();
			$list = array();
			while($row = $st->fetch()) {
				$category = new Category($row);
				$list[] = $category;
			}
			$sql = "SELECT FOUND_ROWS() AS totalRows";
			$totalRows = $conn->query($sql)->fetch();
			$conn = null;
			return(array("results"=>$list, "totalRows"=>$totalRows[0]));
		}

		public function insert() {
			if(!is_null($this->id)) trigger_error("Category:;insert(): Attempt to insert a Category object that already has its ID property set (to this->id).", E_USER_ERROR);
			$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			$sql = "INSERT INTO categories (name, description) VALUES(:name, :description)";
			$st = $conn->prepare($sql);
			$st->bindValue(":name", $this->name, PDO::PARAM_STR);
			$st->bindValue(":description", $this->description, PDO::PARAM_STR);
			$st->execute();
			$this->id = $conn->lastInsertId();
			$conn = null;
		}

		public function update() {
			if ( is_null( $this->id ) ) trigger_error ( "Category::update(): Attempt to update a Category object that does not have its ID property set.", E_USER_ERROR );
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "UPDATE categories SET name=:name, description=:description WHERE id = :id";
			$st = $conn->prepare ( $sql );
			$st->bindValue( ":name", $this->name, PDO::PARAM_STR );
			$st->bindValue( ":description", $this->description, PDO::PARAM_STR );
			$st->bindValue( ":id", $this->id, PDO::PARAM_INT );
			$st->execute();
			$conn = null;
  		}

		public function delete() {
			if ( is_null( $this->id ) ) trigger_error ( "Category::delete(): Attempt to delete a Category object that does not have its ID property set.", E_USER_ERROR );
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$st = $conn->prepare ( "DELETE FROM categories WHERE id = :id LIMIT 1" );
			$st->bindValue( ":id", $this->id, PDO::PARAM_INT );
			$st->execute();
			$conn = null;
		}
	}
?>
