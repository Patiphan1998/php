<?php
include_once("server.php");
$result = mysqli_query($conn, "SELECT * FROM tb_user ORDER BY id DESC");
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Show User</title>
</head>

<body>
    <a href="../home.php">Home</a><br /><br />
    <a href="user_add.php">Add User</a><br /><br />


    <table width='100%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>username</td>
            <td>email</td>
            <td>address</td>
            <td>tel</td>
            <td>status</td>

        </tr>
        <?php
        while ($res = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $res['username'] . "</td>";
            echo "<td>" . $res['email'] . "</td>";
            echo "<td>" . $res['address'] . "</td>";
            echo "<td>" . $res['tel'] . "</td>";
            if ($res['status'] == 1) {
                echo "<td>" . "ผู้ดูแลระบบ" . "</td>";
            } else {
                echo "<td>" . "ผู้ใข้งานทั่วไป" . "</td>";
            }

            echo "<td><a href=\"user_edit.php?id=$res[id]\">Edit</a> | <a href=\"user_delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
        ?>
    </table>
</body>

</html>