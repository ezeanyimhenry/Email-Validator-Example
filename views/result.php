<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Validation Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h2>Validation Result</h2>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_SESSION['status'])) {
                            echo '<div class="alert alert-' . ($_SESSION['status'] === 'success' ? 'success' : 'danger') . '">' . $_SESSION['message'] . '</div>';
                            unset($_SESSION['status']);
                            unset($_SESSION['message']); 
                        } else {
                            echo '<div class="alert alert-warning">No validation result to show.</div>';
                        }
                        ?>

                        <a href="/" class="btn btn-primary mt-3 w-100">Go Back to Form</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>