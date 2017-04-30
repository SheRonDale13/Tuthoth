<?php
	include("templates/include/header.php");
?>
<table>
	<?php
		foreach($results['articles'] as $article) {?>
		<tr>
			<td>
				<span class="pubDate"><?php echo date('j F', $article->publicationDate)?></span>
				<br>
				<span>Published By</span>
			</td>
			<td>
				<h2>
					<a href=".?action=viewArticle&amp;articleId=<?php echo $article->id ?>">
						<?php echo htmlspecialchars($article->title) ?>
					</a>
				</h2>
				<p class="summary">
					<?php echo htmlspecialchars($article->summary) ?>
				</p>
			</td>
		</tr>
	<?php } ?>
</table>
<p class="homepage-archive"><a href="./?action=archive">Article Archive</a></p>
<?php
	include("templates/include/footer.php");
?>
