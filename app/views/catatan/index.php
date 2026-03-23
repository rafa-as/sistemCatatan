<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Catatan</title>
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
						<h2>Daftar Catatan</h2>
						<?php if (isset($_SESSION['success_msg'])): ?>
							<div class="message success_message">
								<?= $_SESSION['success_msg'] ?>
							</div>
							<?php unset($_SESSION['success_msg']); ?>
						<?php endif; ?>
						<a href="index.php?act=catatan-tambah" class="btn btn-primary" id="btn-catatan">Tambah Catatan</a>
					</div>
					<div class="sticky-container">
						<?php if (count($data_catatan) > 0): ?>
							<?php foreach ($data_catatan as $row): ?>

							<div class="sticky-note">
								<div class="note-content">
									<div class="note-desc">

										<h3 class="note-title">
											<?= htmlspecialchars($row['judul']) ?>
										</h3>

										<div class="note-meta">
											<p>
												<span>Kategori :</span> <?= $row['nama_kategori'] ? htmlspecialchars($row['nama_kategori']) : '<i>Tidak ada</i>' ?>
											</p>
											<p>
												<span>Pembuat :</span> <?= htmlspecialchars($row['nama_admin']) ?>
											</p>
											<p>
												<span>Date Modified : </span> <?= htmlspecialchars($row['created_at']) ?>
											</p>
										</div>
											
									</div>
									<div class="note-body">
										<?= nl2br(htmlspecialchars($row['isi'])) ?>
									</div>
	
								</div>

								<div class="note-actions">
									<a href="index.php?act=catatan-edit&id=<?= $row['id'] ?>" class="btn-orange">Edit</a>
									<a href="index.php?act=catatan-hapus&id=<?= $row['id'] ?>" class="btn-red" onclick="return confirm('Yakin ingin menghapus catatan ini?')">Hapus</a>
									
								</div>
							</div>
								
							<?php endforeach; ?>
						<?php else: ?>
							<p style="text-align: center; color: #777; width: 100%;">Belum ada catatan. <br>Silahkan buat catatan baru!</p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>