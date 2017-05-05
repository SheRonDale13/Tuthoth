<div id="adminHeader">
    <h2>Tuthoth Admin</h2>
    <p>
        You are logged in as <b><?php echo htmlspecialchars($_SESSION['username']) ?></b>.
        <a href="admin.php?action=listArticles">Edit Articles</a>
        <a href="admin.php?action=listCategories">Edit Categories</a>
        <a href="admin.php?action=logout">Logout</a>
    </p>
</div>