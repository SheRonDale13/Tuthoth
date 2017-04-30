<?php
	include("templates/include/header.php")
?>
<div class="adminHeader">
	<h2>Tuthoth Admin</h2>
	<div class="logout-container">
		<a href="admin.php?action=logout">Logout</a>
		<span>You are logged in as
		<b>
			<?php
				echo htmlspecialchars($_SESSION['username'])
			?>
		</b></span>
	</div>
</div>
<h1>All Articles</h1>
<?php
		if(isset($results['errorMessage'])) {

?>
		<div class="errorMessage">
			<?php
				echo $results['errorMessage']
			?>
		</div>
<?php
		}
?>
<?php
		if(isset($results['statusMessage'])) {

?>
		<div class="statusMessage">
			<?php
				echo $results['statusMessage']
			?>
		</div>
<?php
		}
?>
<table class="list-container">
	<tr>
		<th>Publication Date</th>
		<th>Article</th>
	</tr>
	<?php
		foreach($results['articles'] as $article) {
	?>
			<tr onclick="location='admin.php?action=editArticle&amp;articleId=<?php echo $article->id ?>'">
				<td>
					<?php
						echo date('j M Y', $article->publicationDate)
					?>
				</td>
				<td>
					<?php
						echo $article->title
					?>
				</td>
			</tr>
	<?php
		}
	?>
</table>
<p>
	<?php
		echo $results['totalRows']
	?>
	article
	<?php
		echo ( $results['totalRows'] != 1 ) ? 's' : ''
	?>
	in total.
</p>
<p>
	<a href="admin.php?action=newArticle">Add a New Article</a>
</p>
<?php
	include("templates/include/footer.php")
?>
