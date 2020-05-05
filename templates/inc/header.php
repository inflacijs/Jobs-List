<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job lister</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>
    <div class="container">
        <div class="header clearfix">
            <nav>
            <ul class="nav nav-pills float-right">
                <li class="nav-item">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="create.php">Create Listing</a>
                </li>
            </ul>
            </nav>
            <h3 class="text-muted"><?php echo SITE_TITLE;?></h3> <!-- SITE_TITLE is defined in config.php -->
        </div>