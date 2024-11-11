
<?php include("partials/header2.php");
?>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center mb-4">
                    <div class="card-body">
                        <i class="fas fa-folder-plus fa-3x mb-3 text-primary"></i>
                        <h5 class="card-title">Manage Categories</h5>
                        <p class="card-text">Add, edit, or delete food categories.</p>
                        <a href="admin/manage-categories.php" class="btn btn-custom">Manage Categories</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center mb-4">
                    <div class="card-body">
                        <i class="fas fa-apple-alt fa-3x mb-3 text-success"></i>
                        <h5 class="card-title">Manage Food Items</h5>
                        <p class="card-text">Add, edit, or delete food items.</p>
                        <a href="admin-food/manage-food.php" class="btn btn-custom">Manage Food Items</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center mb-4">
                    <div class="card-body">
                        <i class="fas fa-chart-bar fa-3x mb-3 text-warning"></i>
                        <h5 class="card-title">Reports</h5>
                        <p class="card-text">View food stock reports and analyze inventory.</p>
                        <a href="reports.php" class="btn btn-custom">View Reports</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("partials/footer.php"); ?>


