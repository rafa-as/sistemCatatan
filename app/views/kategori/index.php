<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kategori</title>
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
						<h2>Daftar Kategori</h2>
						<?php if (isset($_SESSION['success_msg'])): ?>
							<div class="message success_message">
								<?= $_SESSION['success_msg'] ?>
							</div>
							<?php unset($_SESSION['success_msg']); ?>
						<?php endif; ?>
						<a href="index.php?act=kategori-tambah" class="btn btn-primary" id="btn-tambah">Tambah Kategori</a>
					</div>
					<div class="table-wrapper">
						<table class="ktable">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nama Kategori</th>
									<th>Admin</th>
									<th style="text-align: center; width: 200px;">Aksi</th>
								</tr>
							</thead>
							<tbody>
								
								<?php 
								$no = 1;
								if (count($data_kategori) > 0):
									foreach ($data_kategori as $row):
										?>
									<tr>
										<td>
											<?= $no ?>
										</td>
										<td>
											<?= $row['nama_kategori'] ?>
										</td>
										<td>
											<?= $row['nama_admin'] ?>
										</td>
										<td class="row-aksi">
											<a href="index.php?act=kategori-edit&id=<?= $row['id'] ?>" class="btn-orange">Edit</a>
											<a href="index.php?act=kategori-hapus&id=<?= $row['id'] ?>" class="btn-red" onclick="return confirm('Yakin ingin menghapus kategori ini?')">Hapus</a>
										</td>
									</tr>
									<?php 
								$no++;
								endforeach;
								?>	
								<?php else: ?>
									<tr>
										<td colspan="3" style="text-align: center;">Belum ada kategori.</td>
									</tr>
									<?php endif; ?>
								</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>