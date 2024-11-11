<?php
include('../partials/header.php');
$showForm = isset($_GET['showform']) && $_GET['showform'] == "True";
$sql="SELECT * FROM categories";
$result=$conn->query($sql);
//edit side
$editCategory=null;
$editId=$_GET['id'];
if(isset($editId))
{
    $sql="SELECT *from `categories` WHERE category_id=$editId";
    $res=$conn->query($sql);
    if($res->num_rows>0){
        $editCategory=$res->fetch_assoc();
    }
}
?>
<h3 class="mt-4 text-center">Manage Categories</h3>
<div class="container">
    <div class="row">
        <a class="button-link link-offset-2 link-underline link-underline-opacity-0"  href="?showform=True">ADD CATEGORY</a>
    </div>
    <?php if($showForm): ?>
        <form action="add-category.php" method="post">
            <div class="row">
                <div class="col mt-5">
                    <input type="hidden" class="form-control"  name="category_id">
                    <input type="text" class="form-control" placeholder="Category" name="name">
                    <input type="text" class="form-control" placeholder="Description" name="description">
                    <button type="submit" class="btn btn-primary">ADD</button>
                </div>
            </div>
        </form>

    <?php endif; ?>

    <!--edit section-->
    <?php if($editCategory): ?>
        <form action="edit-cat.php?id=<?php echo $editCategory['category_id']; ?>" method="POST">
            <div class="row">
                <div class="col mt-5">
                    <input type="hidden" class="form-control"  name="category_id" >
                    <input type="text" class="form-control" placeholder="Category" name="name" value="<?php echo $editCategory['name']; ?>">
                    <input type="text" class="form-control" placeholder="Description" name="description" value="<?php echo $editCategory['description']; ?>">
                    <button type="submit" class="btn btn-primary">EDIT</button>
                </div>
            </div>
        </form>

    <?php endif; ?>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row["category_id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["description"]; ?></td>
                    <td>
                        <a href="manage-categories.php?id=<?php echo $row['category_id']; ?>" class="link-warning">EDIT</a>
                        <a href="delete-cat.php?id=<?php echo $row['category_id']; ?>"
                           class="link-success p-3"
                           onclick="return confirm('Are you sure you want to delete this category?')">DELETE</a>

                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>
<?php include('../partials/footer.php') ?>

