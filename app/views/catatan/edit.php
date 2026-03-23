<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Catatan</title>
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
						<h2>Edit Catatan</h2>
						<?php if (isset($_SESSION['error_msg'])): ?>
							<div class="message error_message">
								<?= $_SESSION['error_msg'] ?>
							</div>
							<?php unset($_SESSION['error_msg']); ?>
						<?php endif; ?>
						<a href="index.php?act=catatan" class="btn btn-primary" id="btn-back">Back</a>
					</div>
					<form action="index.php?act=catatan-edit-proses" method="post" class="form-wrapper">
						<input type="hidden" name="id" value="<?= $catatan['id'] ?>">
						<div class="form-group">
							<label for="judul_catatan">Judul Catatan</label>
							<input type="text" name="judul" id="judul" placeholder="Masukkan judul catatan..." value="<?= htmlspecialchars($catatan['judul']) ?>" maxlength="50" required>
						</div>

						<div class="form-group">
							<label for="kategori">Pilih kategori</label>
							<select name="kategori_id" id="kategori_id" class="form-control" required>
								<option value="" disabled selected>-- Tanpa Kategori --</option>
								<?php if(isset($data_kategori) && count($data_kategori) > 0): ?>
									<?php foreach($data_kategori as $kat): ?>
										<option value="<?= $kat['id'] ?>" <?= $kat['id'] == $catatan['kategori_id'] ? 'selected' : '' ?>><?= $kat['nama_kategori'] ?></option>
									<?php endforeach; ?>	
								<?php endif; ?>
							</select>
						</div>

						<div class="form-group">
							<label for="isi">Isi Catatan</label>
							<textarea name="isi" class="form-control" rows="5" placeholder="Tuliskan catatan anda di sini" maxlength="500" required id="isi"><?= htmlspecialchars($catatan['isi']) ?></textarea>
							<div id="counter"></div>
						</div>

						<button type="submit" class="btn btn-submit">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>

<script>
const textarea = document.getElementById("isi");
const counter = document.getElementById("counter");
const max = textarea.maxLength;

counter.textContent = "0 / " + max;

textarea.addEventListener("input", () => {
  counter.textContent = textarea.value.length + " / " + max;
});
</script>
</body>
</html>