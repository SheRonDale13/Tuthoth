<?php include "templates/include/header.php" ?>
<?php include "templates/admin/include/header.php" ?>

<h1>Article Categories</h1>

<?php
    if(isset($results['errorMessage'])) {
?>
        <div class="errorMessage">
            <?php echo $results['errorMessage'] ?>
        </div>
<?php
    }
?>
<?php
    if(isset($results['statusMessage'])) {
?>
        <div class="statusMessage">
            <?php echo $results['statusMessage'] ?>
        </div>
<?php
    }
?>
<table>
    <tr>
        <th>Category</th>
    </tr>
    <?php 
        foreach($results['categories'] as $category) {
    ?>
            <tr onclick="location='admin.php?action=editCategory&amp;categoryId=<?php echo $category->id ?>'">
                <td>
                    <?php echo $category->name ?>
                </td>
            </tr>
    <?php
        }
    ?>
</table>

<p>
    <?php echo $results['totalRows'] ?> categor<?php echo ($results['totalRows'] != 1) ? 'ies' : 'y' ?> in total.
</p>
<p>
    <a href="admin.php?action=newCategory">Add a New Category</a>
</p>
<?php include "templates/include/footer.php" ?>