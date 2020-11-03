<?php

$dsn = 'mysql:host=localhost;dbname=employee';
$username = 'root';
$password = '';

try{
    // Connect To MySQL Database
    $con = new PDO($dsn,$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $ex) {

    echo 'Not Connected '.$ex->getMessage();

}

$id = '';
$eventname = '';
$eventlocation = '';
$eventdescription = '';
$contactno = '';

function getPosts()
{
    $posts = array();

    $posts[0] = $_POST['id'];
    $posts[1] = $_POST['eventname'];
    $posts[2] = $_POST['eventlocation'];
    $posts[3] = $_POST['eventdescription'];
    $posts[4] = $_POST['contactno'];

    return $posts;
}

//Search And Display Data

if(isset($_POST['search']))
{
    $data = getPosts();
    if(empty($data[0]))
    {
        echo 'Enter The User Id To Search';
    }  else {

        $searchStmt = $con->prepare('SELECT * FROM users WHERE id = :id');
        $searchStmt->execute(array(
                    ':id'=> $data[0]
        ));

        if($searchStmt)
        {
            $user = $searchStmt->fetch();
            if(empty($user))
            {
                echo 'No Data For This Id';
            }

            $id    = $user[0];
            $eventname = $user[1];
            $eventlocation = $user[2];
            $eventdescription   = $user[3];
            $contactno   = $user[4];
        }

    }
}

// Insert Data

if(isset($_POST['insert']))
{
    $data = getPosts();
    if(empty($data[0]) || empty($data[1]) || empty($data[2]) || empty($data[4]))
    {
        echo 'Enter The User Data To Insert';
    }  else {

        $insertStmt = $con->prepare('INSERT INTO users(id,eventname,eventlocation,eventdescription,contactno) VALUES(:id,:eventname,:eventlocation,:eventdescription,:contactno)');
        $insertStmt->execute(array(
                    ':id'=> $data[0],
                    ':eventname'=> $data[1],
                    ':eventlocation'=> $data[2],
                    ':eventdescription'  => $data[3],
                    ':contactno'  => $data[4],
        ));

        if($insertStmt)
        {
                echo 'Event Inserted Successfully';
        }

    }
}

//Update Data

if(isset($_POST['update']))
{
    $data = getPosts();
    if(empty($data[0]) || empty($data[1]) || empty($data[2]) || empty($data[4]))
    {
        echo 'Enter The User Data To Update';
    }  else {

        $updateStmt = $con->prepare('UPDATE users SET eventname = :eventname, eventlocation = :eventlocation, eventdescription = :eventdescription, contactno = :contactno WHERE id = :id');
        $updateStmt->execute(array(
                    ':id'=> $data[0],
                    ':eventname'=> $data[1],
                    ':eventlocation'=> $data[2],
                    ':eventdescription'  => $data[3],
                    ':contactno'  => $data[3],
        ));

        if($updateStmt)
        {
                echo 'Event Updated';
        }

    }
}

// Delete Data

if(isset($_POST['delete']))
{
    $data = getPosts();
    if(empty($data[0]))
    {
        echo 'Enter The User ID To Delete';
    }  else {

        $deleteStmt = $con->prepare('DELETE FROM users WHERE id = :id');
        $deleteStmt->execute(array(
                    ':id'=> $data[0]
        ));

        if($deleteStmt)
        {
                echo 'User Deleted';
        }

    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP (MySQL PDO): Insert, Update, Delete, Search</title>
    </head>
    <body>
        <form action="php_mysql_insert_update_delete_search.php" method="POST">

            <input type="text" name="id" placeholder="Event ID" value="<?php echo $id;?>"><br><br>
            <input type="text" name="eventname" placeholder="Event Name" value="<?php echo $eventname;?>" size="50"><br><br>
            <input type="text" name="eventlocation" placeholder="Event Location" value="<?php echo $eventlocation;?>"><br><br>
            <input type="text" name="eventdescription" placeholder="Event Description" value="<?php echo $eventdescription;?>"><br><br>
            <input type="text" name="contactno" placeholder="Contact No" value="<?php echo $contactno;?>"><br><br>

            <input type="submit" name="insert" value="Insert">
            <input type="submit" name="update" value="Update">
            <input type="submit" name="delete" value="Delete">
            <input type="submit" name="search" value="Search">

        </form>

    </body>
</html>
