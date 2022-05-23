<?php
include "templates/header.php";
$app -> adminpage();
$connect = mysqli_connect("localhost", "root", "", "cart_system");

if (isset($_POST["Submit"]))
{
    //Variables 
	$title=mysqli_real_escape_string($connect,$_POST['title']);
	$desc= mysqli_real_escape_string($connect,$_POST['desc']);
	$begin=$_POST['begin'];
	$end=$_POST['end'];
	
	$insert=mysqli_query($connect, "INSERT INTO events(Title,EventDescription,EventBegins,EventEnds) VALUES('$title','$desc','$begin','$end')");
	
	if (!$insert)
	{
		die("Error: ".mysqli_error($connect));
	}
	else
	{
		echo "<script> alert('You Have created an Event') </script>";
		echo "<script> location.href='events.php' </script>";
		
	}
}else if (isset($_POST["deleteusr"]))
{
    $eid = $_POST["EventId"];

    $sql = "DELETE FROM events WHERE EventId = $eid";
    if ($connect->query($sql) === TRUE) {

        echo '<script> alert("Event Deleted")</script>';
        echo '<script>window.location="events.php"</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
?>

<div class="event-header">
<div class="seperator-div"></div>
    <h2 class="event-hdr">Events</h2>
</div>

<div class="event-body">
    <table>
        <h2>Manage Events</h2>
    <tr>
            <th>EventID</th>
            <th>Title</th>
            <th>EventDescription</th>
            <th>Event Begins</th>
            <th>Event Ends</th>
            <th>Action</th>
        </tr>

        <?php
        $query = "SELECT * FROM events ORDER BY EventID ASC";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <form action="events.php" method="POST">
                    <tr>
                        <td><?php echo $row["EventID"]; ?></td>
                        <td><?php echo $row["Title"]; ?></td>
                        <td><?php echo $row["EventDescription"]; ?></td>
                        <td><?php echo $row["EventBegins"]; ?></td>
                        <td><?php echo $row["EventEnds"]; ?></td>
                        <td  style="text-align: center;"><input type="submit" value="Delete" name="deleteusr" class="btn btn-danger"></td>
                        <input type="hidden" name="EventId" value="<?php echo $row["EventID"] ?>">

                    </tr>
                </form>
        <?php
            }
        }
        ?>
    </table>

    <table>
        <form action="events.php" method="POST">
            <h3>Add Events</h3>

            <tr>
                <th>Title</th>
                <td><input type="text" name="title" style="width: 700px;" required></td>
            </tr>
            <tr>
                <th>EventDescription</th>
                <td><input type="text" name="desc" style="width: 700px;"></td>
            </tr>
            <tr>
                <th>Event Begin</th>
                <td><input type="date" name="begin" style="width: 700px;" required></td>
            </tr>
            <tr>
                <th>Event End</th>
                <td><input type="date" name="end" style="width: 700px;" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><input type="Submit" name="Submit" value="Submit" class="btn btn-success"></td>
            </tr>
        </form>
    </table>

</div>

<?php include "templates/footer.php"; ?>