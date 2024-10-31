<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="https://jsnotprom.github.io/">
                <img src="JSG WEBPAGE LOGO BLACK.png" alt="Logo" style="height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item"><a class="nav-link" href="https://jsnotprom.github.io/">Projects</a></li>

                </ul>
            </div>
        </div>
    </nav>


<div class="container mt-5">
    <h2 class="text-center mb-4">User Information</h2>


<?php
include("connect.php");
    $sql = "SELECT userInfoID, userID, addressID, firstName, lastName, birthday FROM userinfo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>
                <thead class='table-dark'>
                    <tr>
                        <th>userID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Birthday</th>
                    </tr>
                </thead>
                <tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['userID'] . "</td>
                    <td>" . $row['firstName'] . "</td>
                    <td>" . $row['lastName'] . "</td>
                    <td>" . $row['birthday'] . "</td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p class='text-center'>No records found.</p>";
    }

    $conn->close();
?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="footer">
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top"
        style="background-color: #f5f5f5; margin-top: 270px;">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="me-2 text-body-secondary text-decoration-none">
                <img src="JSG WEBPAGE LOGO BLACK.png" alt="Logo" width="30" height="30"
                    style="margin-left: 20px;">
            </a>
            <span class="text-body-secondary">© John Stephen Galarrita, BSIT 3-1</span>
        </div>
        <ul class="nav justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a href="https://x.com/jsnotprom"><svg viewBox="0 0 1200 1227"
                        style="width:35px; height:35px;">
                        <title>twitter</title>
                        <path
                            d="M714.163 519.284 1160.89 0h-105.86L667.137 450.887 357.328 0H0l468.492 681.821L0 1226.37h105.866l409.625-476.152 327.181 476.152H1200L714.137 519.284h.026ZM569.165 687.828l-47.468-67.894-377.686-540.24h162.604l304.797 435.991 47.468 67.894 396.2 566.721H892.476L569.165 687.854v-.026Z">
                        </path>
                    </svg>
                </a>
            </li>
            <li class="ms-3"><a href="https://www.instagram.com/js_galarrita/?hl=en"><svg viewBox="0 0 13.26 13.3"
                        style="width:40px; height:40px;">
                        <title>instagram</title>
                        <path
                            d="M6.67 3.24a3.43 3.43 0 1 0 3.42 3.44 3.43 3.43 0 0 0-3.42-3.44Zm0 5.65a2.22 2.22 0 1 1 2.22-2.22 2.21 2.21 0 0 1-2.22 2.22Z"
                            transform="translate(-.04 .05)" style="fill:#000000;fill-rule:evenodd"></path>
                        <path d="M11 3.08a.8.8 0 1 1-.8-.8.8.8 0 0 1 .8.8Z" transform="translate(-.04 .05)"
                            style="fill:#000000"></path>
                        <path
                            d="M6.67 0H3.92A5 5 0 0 0 2.3.31a3.31 3.31 0 0 0-1.18.77 3.31 3.31 0 0 0-.77 1.18A5.29 5.29 0 0 0 0 3.88v5.5A5.22 5.22 0 0 0 .35 11a3.35 3.35 0 0 0 .77 1.19 3.42 3.42 0 0 0 1.18.76 4.75 4.75 0 0 0 1.62.31h5.5a4.75 4.75 0 0 0 1.58-.32 3.15 3.15 0 0 0 1.18-.76A3.35 3.35 0 0 0 13 11a5 5 0 0 0 .31-1.61V3.88A5 5 0 0 0 13 2.26a3.46 3.46 0 0 0-2-2A5 5 0 0 0 9.37 0a26.88 26.88 0 0 1-2.7 0Zm0 1.2h2.69a3.78 3.78 0 0 1 1.24.23 2.21 2.21 0 0 1 1.27 1.27 3.67 3.67 0 0 1 .23 1.23v5.39a3.78 3.78 0 0 1-.23 1.24 2.21 2.21 0 0 1-1.27 1.27 3.77 3.77 0 0 1-1.24.22H4a3.77 3.77 0 0 1-1.24-.22 2.21 2.21 0 0 1-1.27-1.27 3.78 3.78 0 0 1-.23-1.24V3.93a3.67 3.67 0 0 1 .21-1.23 2.21 2.21 0 0 1 1.27-1.27A3.78 3.78 0 0 1 4 1.2c.68.01.89 0 2.67 0Z"
                            transform="translate(-.04 .05)" style="fill:#000000;fill-rule:evenodd"></path>
                    </svg>
                </a>
            </li>
            <li class="ms-3"><a href="https://www.facebook.com/jsnotprom/"><svg viewBox="0 0 15 15"
                        style="width:40px; height:40px;">
                        <title>facebook</title>
                        <path
                            d="M15 7.54A7.5 7.5 0 1 0 6.33 15V9.73h-1.9V7.54h1.9V5.91a2.65 2.65 0 0 1 2.83-3 12.09 12.09 0 0 1 1.68.14v1.86H9.9a1.09 1.09 0 0 0-1.23 1.18V7.5h2.08l-.33 2.19H8.67v5.27A7.54 7.54 0 0 0 15 7.54Z">
                        </path>
                    </svg>
                </a>
            </li>
        </ul>
    </footer>

    </div>

</body>
</html>