 <?php 
class KategoriModel {
	private $conn;
	private $table_name = "kategori";

	public function __construct($db){
		$this->conn = $db;
	}

	public function getAll() {
		$query = "SELECT kategori.*,admin.username as nama_admin FROM " . $this->table_name . " 
		JOIN admin ON kategori.admin_id = admin.id 
		ORDER BY kategori.id ASC";

		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function addKategori($nama_kategori) {
		$query = "INSERT INTO " . $this->table_name . " (nama_kategori) VALUES (:nama_kategori)";
		$stmt = $this->conn->prepare($query);

		$nama_kategori=htmlspecialchars(strip_tags($nama_kategori));

		$stmt->bindParam(":nama_kategori", $nama_kategori);

		if($stmt->execute()){
			return true;
		}
		return false;
	}

	public function cekKategoriAda($nama_kategori) {
		$query = "SELECT id FROM ".$this->table_name ." WHERE nama_kategori = :nama LIMIT 1";
 		$stmt = $this->conn->prepare($query);

		$nama_kategori = htmlspecialchars(strip_tags($nama_kategori));
		$stmt->bindParam(":nama", $nama_kategori);
		$stmt->execute();

		if ($stmt->rowCount() > 0){
			return true;
		}
		return false;
	}

	public function create($nama_kategori, $admin_id) {
		$query = "INSERT INTO ".$this->table_name ." (nama_kategori, admin_id) VALUES (:nama, :admin_id)";
		$stmt = $this->conn->prepare($query);

		$nama_kategori = htmlspecialchars(strip_tags($nama_kategori));

		$stmt->bindParam(":nama", $nama_kategori);
		$stmt->bindParam(":admin_id", $admin_id);

		return $stmt->execute();
	}

	public function delete($id) {
		$query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(":id", $id);

		return $stmt->execute();
	}

 	public function update($id, $nama_kategori) {
		$query = "UPDATE " . $this->table_name . " SET nama_kategori = :nama WHERE id = :id";
		$stmt = $this->conn->prepare($query);

		$nama_kategori = htmlspecialchars(strip_tags($nama_kategori));
		$id = htmlspecialchars(strip_tags($id));

		$stmt->bindParam(":nama", $nama_kategori);
		$stmt->bindParam(":id", $id);

		return $stmt->execute();
	}

	public function getById($id) {
		$query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 1";
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(":id", $id);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

}
?>