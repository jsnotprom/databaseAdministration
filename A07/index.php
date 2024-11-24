<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Inforation Sheet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

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

    <?php
    date_default_timezone_set('Asia/Manila');
    $currentDate = date('F d, Y');      
    $currentTime = date('g:i A');      
    
    echo "<div class='text-center mt-5'>
            <h1>$currentDate<br>$currentTime</h1> 
          </div>";
    ?>


    <div class="container mt-5">
        <h2 class="left-align mb-4">Add New Employee</h2>

        <form action="addUser.php" method="POST">
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="firstName" class="form-control" placeholder="First Name" required>
                </div>
                <div class="col">
                    <input type="text" name="lastName" class="form-control" placeholder="Last Name" required>
                </div>
                <div class="col">
                    <input type="date" name="birthday" class="form-control" required>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary mb-5 w-20">Add Employee</button>
            </div>
        </form>

        <h2 class="left-align mb-4">Employee Information</h2>

        <?php
        include("connect.php");
        $sql = "SELECT userInfoID, userID, addressID, firstName, lastName, birthday FROM userinfo";
        $result = $conn->query($sql);
        ?>

        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birthday</th>
                    <th style='width: 15%;'>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['firstName']); ?></td>
                        <td><?php echo htmlspecialchars($row['lastName']); ?></td>
                        <td><?php echo htmlspecialchars($row['birthday']); ?></td>
                        <td>
        
                            <button class='btn btn-success edit-btn px-4' data-bs-toggle='modal' data-bs-target='#editModal'
                                data-id='<?php echo $row['userInfoID']; ?>'
                                data-firstname='<?php echo htmlspecialchars($row['firstName']); ?>'
                                data-lastname='<?php echo htmlspecialchars($row['lastName']); ?>'
                                data-birthday='<?php echo $row['birthday']; ?>'>
                                Edit
                            </button>
                            <form action='deleteUser.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='userInfoID' value='<?php echo $row['userInfoID']; ?>'>
                                <button type='submit' class='btn btn-danger'>Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Employee Info</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editForm" action="updateUser.php" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="userInfoID" id="editUserInfoID">
                            <div class="mb-3">
                                <label for="editFirstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="firstName" id="editFirstName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editLastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lastName" id="editLastName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editBirthday" class="form-label">Birthday</label>
                                <input type="date" class="form-control" name="birthday" id="editBirthday" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="footer">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top"
            style="background-color: #f5f5f5; margin-top: 100px;">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="me-2 text-body-secondary text-decoration-none">
                    <img src="JSG WEBPAGE LOGO BLACK.png" alt="Logo" width="30" height="30" style="margin-left: 20px;">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-btn');
            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    document.getElementById('editUserInfoID').value = this.dataset.id;
                    document.getElementById('editFirstName').value = this.dataset.firstname;
                    document.getElementById('editLastName').value = this.dataset.lastname;
                    document.getElementById('editBirthday').value = this.dataset.birthday;
                });
            });
        });
    </script>

</body>

</html>