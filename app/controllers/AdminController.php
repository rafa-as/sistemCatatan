<?php 
include_once 'config/database.php';
include_once 'app/models/AdminModel.php';

class AdminController {
	private $db;
	private $adminModel;

	public function __construct(){
		$database = new Database();
		$this->db = $database->getConnection();
		$this->adminModel = new AdminModel($this->db);
	}

	public function viewRegister(){
		include 'app/views/auth/register.php';
	}

	public function register() {
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$username = $_POST['username'];
			$password = $_POST['password'];

			if(empty($username) || empty($password)){
				$error = "Username dan password tidak boleh kosong.";
				include 'app/views/auth/register.php';
				return;
			}

			if(strlen($password) < 5){
				$error = "Password minimal harus 5 karakter.";
				include 'app/views/auth/register.php';
				return;
			}

			if($this->adminModel->usernameExists($username)){
				$error = "Username sudah terdaftar. Gunakan username lain.";
				include 'app/views/auth/register.php';
				return;
			}

			if($this->adminModel->register($username, $password)){
				$success = "Registrasi berhasil. Silakan login.";
				$admin = $this->adminModel->login($username, $password);
				$_SESSION['admin_id'] = $admin['id'];
				$_SESSION['username'] = $admin['username'];

            header("Location: index.php?act=dashboard");
            exit;
				// echo "<script>alert('Registrasi berhasil. Silakan login.'); window.location.href='index.php';</script>";
				// include 'app/views/auth/login.php';
			} else {
				$error = "Gagal registrasi. Coba lagi.";
				include 'app/views/auth/register.php';
			}
		}
	}

	public function index()
	{
		if (isset($_SESSION['admin_id'])) {
			header("Location: index.php?act=dashboard");
			exit;
		}
		include 'app/views/auth/login.php';
	}

	public function login() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validasi password minimal 5 karakter
        if(strlen($password) < 5){
            $error = "Password harus minimal 5 karakter.";
            include 'app/views/auth/login.php';
            return;
        }

        $admin = $this->adminModel->login($username, $password);
		
        if ($admin) {
            // simpan session
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['username'] = $admin['username'];

            header("Location: index.php?act=dashboard");
            exit;
        } else {
            $error = "Username atau password salah.";
            include 'app/views/auth/login.php';
        }
    }
	}

	public function dashboard()
	{
		if (!isset($_SESSION['admin_id'])) {
			header("Location: index.php");
		}
		include 'app/views/dashboard/index.php';
	}

	public function logout() {
		session_destroy();
		header("Location: index.php");
	}
}
?>