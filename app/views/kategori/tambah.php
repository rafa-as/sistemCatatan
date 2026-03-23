<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<!-- <link rel="stylesheet" href="public/css/style.css"> -->
	<link rel="stylesheet" href="public/css/dashboard.css">
</head>
<body>
	<div class="main-container">
		<?php 
		include 'app/views/components/nav.php';
		?>
		<div class="dashboard-container">
			<?php include 'app/views/components/sidebar.php'; ?>
			<div class="dashboard-content">
				<div class="card">
					<div class="card-header">
						<h2>Tambah Kategori</h2>
						<?php if (isset($_SESSION['error_msg'])): ?>
							<div class="message error_message">
								<?= $_SESSION['error_msg'] ?>
							</div>
							<?php unset($_SESSION['error_msg']); ?>
						<?php endif; ?>
						<a href="index.php?act=kategori" class="btn btn-primary" id="btn-back">Back</a>
					</div>
					<form action="index.php?act=kategori-tambah-proses" method="post" class="form-wrapper">
						<div class="form-group">
							<label for="nama_kategori">Nama Kategori</label>
							<input type="text" name="nama_kategori" id="nama_kategori" placeholder="Masukkan nama kategori" required>
						</div>
						<button type="submit" class="btn btn-submit">Tambah</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>