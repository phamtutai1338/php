<?php

?>


<?php
$id = $_GET['id'];

$result = mysqli_query($myspli,"SELECT*FROM student WHERE id = $id");
while ($stu_data = mysqli_fetch_array($result)){
    $name = $stu_data['name'];
    $email = $stu_data['email'];
    $mobile = $stu_data['mobile'];
    $result = mysqli_query($myspli,"UPDATE student SET name = '$name',email='$email'
,mobile = '$mobile' WHERE id=$id");
    header("Location: index.php");
}
?>
<?php
$id = $_GET['id'];
$result = mysqli_query($myspli,"SELECT *FROM student WHERE id =$id");
while ($user_data = mysqli_fetch_array($result))
{
    $name = $user_data['name'];
    $email= $user_data['email'];
    $mobile = $user_data['mobile'];
}
?>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
<a href="index.php">Home</a>
<br/><br/>
<form name ="update_student" method="post" action="edit.php">
    <table border="0">
        <tr>
            <td>Name</td>
            <td><input type ="text" name="name" value=<?php echo $name;?>></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name ="email" value=<?php echo $email;?>></td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td><input type="text" name="mobile" value=<?php echo $mobile;?>></td>
        </tr>
        <tr>
            <td><input type="hidden" name ="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name = "update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>


