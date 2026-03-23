			<div class="sidebar">
				<ul class="side-nav">
					<li><a href="index.php?act=dashboard" class="side-btn <?= ($_GET['act'] ?? '') == 'dashboard' ? 'active' : '' ?>">Dashboard</a></li>
					<li><a href="index.php?act=catatan" class="side-btn <?= ($_GET['act'] ?? '') == 'catatan' ? 'active' : '' ?>">Catatan</a></li>
					<li><a href="index.php?act=kategori" class="side-btn <?= ($_GET['act'] ?? '') == 'kategori' ? 'active' : '' ?>">Kategori</a></li>			</ul>
			</div>