<?php
include('../partials/header.php');
include('db.php'); // Make sure db.php connects to your database

$showForm = isset($_GET['showform']) && $_GET['showform'] == "True";
$edit = null;

// Check if it's an edit operation
if (isset($_GET['id'])) {
    $editFood = $_GET['id'];
    $result = $conn->query("SELECT * FROM foods WHERE food_id = $editFood");
    $edit = $result->fetch_assoc();
}
?>

<h3 class="mt-4 text-center">Manage Food</h3>
<div class="container">
    <!-- Add New Food Item -->
    <div class="row">
        <a class="button-link link-offset-2 link-underline link-underline-opacity-0" href="?showform=True">ADD FOOD</a>
    </div>

    <?php if ($showForm): ?>
        <form action="add-food.php" method="post">
            <div class="row">
                <div class="col mt-5">
                    <input type="hidden" class="form-control" name="food_id">
                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                    <select class="form-control" name="category_id">
                        <option value="">Select Category</option>
                        <?php
                        $categories = $conn->query("SELECT * FROM categories");
                        while ($category = $categories->fetch_assoc()) {
                            echo "<option value='" . $category['category_id'] . "'>" . $category['name'] . "</option>";
                        }
                        ?>
                    </select>
                    <input type="number" class="form-control" placeholder="Quantity" name="quantity" required>
                    <input type="date" class="form-control" placeholder="Expiry Date" name="expiry_date">
                    <button type="submit" name="submit" class="btn btn-primary mt-3">ADD</button>
                </div>
            </div>
        </form>
    <?php endif; ?>

    <!-- Edit Section -->
    <?php if ($edit): ?>
        <div class="row">
            <form action="edit-food.php?id=<?php echo htmlspecialchars($edit['food_id']); ?>" method="POST">
                <div class="col mt-5">
                    <input type="hidden" class="form-control" name="food_id" value="<?php echo htmlspecialchars($edit['food_id']); ?>">
                    <input type="text" class="form-control" placeholder="Food name" name="name" value="<?php echo htmlspecialchars($edit['name']); ?>" required>
                    <select class="form-control" name="category_id">
                        <option value="">Select Category</option>
                        <?php
                        $categories = $conn->query("SELECT * FROM categories");
                        while ($category = $categories->fetch_assoc()) {
                            $selected = $category['category_id'] == $edit['category_id'] ? 'selected' : '';
                            echo "<option value='" . $category['category_id'] . "' $selected>" . $category['name'] . "</option>";
                        }
                        ?>
                    </select>
                    <input type="number" class="form-control" placeholder="Quantity" name="quantity" value="<?php echo htmlspecialchars($edit['quantity']); ?>" required>
                    <input type="date" class="form-control" name="expiry_date" value="<?php echo htmlspecialchars($edit['expiry_date']); ?>">
                    <button type="submit" class="btn btn-primary mt-3">EDIT</button>
                </div>
            </form>
        </div>
    <?php endif; ?>

    <!-- Display Food Items -->
    <div class="row mt-4">
        <table class="table">
            <thead>
            <tr>
                <th>Food ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Expiry Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $foods = $conn->query("SELECT foods.food_id, foods.name, foods.quantity, foods.expiry_date, categories.name AS category_name FROM foods LEFT JOIN categories ON foods.category_id = categories.category_id");
            while ($row = $foods->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $row["food_id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["category_name"] ; ?></td>
                    <td><?php echo $row["quantity"]; ?></td>
                    <td><?php echo $row["expiry_date"]; ?></td>
                    <td>
                        <a href="manage-food.php?id=<?php echo $row['food_id']; ?>" class="link-warning">EDIT</a>
                        <a href="delete.php?id=<?php echo $row['food_id']; ?>" class="link-success p-3" onclick="return confirm('Are you sure you want to delete this item?')">DELETE</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include('../partials/footer.php');
?>
