<?php include "header.php" ?>


<div class="container">
<table class="table table-danger table-striped table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>name</th>
            <th>email</th>
            <th>phone</th>
            <th>subject</th>
            <th>message</th>
        </tr>
    </thead>
    <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["name"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["phone"] . "</td>
                            <td>" . $row["subject"] . "</td>
                            <td>" . $row["message"] . "</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No data found</td></tr>";
            }
            $conn->close();
            ?>
</table>
</div>