<?php
sql = " INSERT INTO complaint (name, email, phone_no, complaint_text)
values ('$name','$email', '$phone_no', '$complaint_text')";
if ($conn->query($sql)){
echo "New complaint is submitted sucessfully";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
else{
echo "complaint should not be empty";
die();
}
?>
