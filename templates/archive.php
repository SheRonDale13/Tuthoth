<?php
	include("templates/include/header.php");
?>
<h1>Article Archive</h1>
<ul class="headlines archive">
	<?php
		foreach($results['articles'] as $article) { ?>
			<li>
				<h2>
					<span class="pubDate">
						<?php
							echo date('j F Y', $article->publicationDate)
						?>
					</span>
					<a href=".?action=viewArticle&amp;articleId=<?php echo $article->id ?>">
						<?php
							echo htmlspecialchars($article->title)
						?>
					</a>
				</h2>
				<p class="summary">
					<?php
						echo htmlspecialchars($article->summary)
					?>
				</p>
			</li>
	<?php	}
	?>
</ul>
<p>
	<?php
		echo $results['totalRows'].' '
	?>
	article
	<?php
		echo ($results['totalRows'] != 1) ? 's ' : ' '
	?>
	in total.
</p>
<?php
	include("templates/include/footer.php")
?>
