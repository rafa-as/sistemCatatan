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
						<h2>Edit Kategori</h2>
						<?php if (isset($_SESSION['error_msg'])): ?>
							<div class="message error_message">
								<?= $_SESSION['error_msg'] ?>
							</div>
							<?php unset($_SESSION['error_msg']); ?>
						<?php endif; ?>
						<a href="index.php?act=kategori" class="btn btn-primary" id="btn-back">Back</a>
					</div>
					<form action="index.php?act=kategori-edit-proses" method="post" class="form-wrapper">
						<div class="form-group">
							<input type="hidden" name="id" value="<?=  $kategori['id'] ?>" id="">
							<label for="nama_kategori">Nama Kategori</label>
							<input type="text" name="nama_kategori" value="<?= $kategori['nama_kategori'] ?>" required id="nama_kategori">
						</div>

						<button type="submit" class="btn btn-submit">Edit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>