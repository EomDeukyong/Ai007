<!DOCTYPE html>
<html>
<head>
	<title>피자 호감도</title>
</head>
<body>
	<h1>좋아하는 피자 5개와 좋아하는정도 입력</h1>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label>피자1:</label>
		<input type="text" name="data1" required><br><br>
        <label>좋아하는 정도:</label>
		<input type="number" name="like1" required><br><br>
		<label>피자2:</label>
		<input type="text" name="data2" required><br><br>
        <label>좋아하는 정도:</label>
		<input type="number" name="like2" required><br><br>
        <label>피자3:</label>
		<input type="text" name="data3" required><br><br>
        <label>좋아하는 정도:</label>
		<input type="number" name="like3" required><br><br>
        <label>피자4:</label>
		<input type="text" name="data4" required><br><br>
        <label>좋아하는 정도:</label>
		<input type="number" name="like4" required><br><br>
        <label>피자5:</label>
		<input type="text" name="data5" required><br><br>
        <label>좋아하는 정도:</label>
		<input type="number" name="like5" required><br><br>
		<input type="submit" value="제출">
	</form>
<?php
// MySQL 데이터베이스 연결 설정
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pizza";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// POST 데이터 가져오기
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data1 = $_POST['data1'];
    $data2 = $_POST['data2'];
    $data3 = $_POST['data3'];
    $data4 = $_POST['data4'];
    $data5 = $_POST['data5'];
    $like1 = $_POST['like1'];
    $like2 = $_POST['like2'];
    $like3 = $_POST['like3'];
    $like4 = $_POST['like4'];
    $like5 = $_POST['like5'];

    // 데이터 삽입하기
    $sql = "INSERT INTO pizza (label, value) VALUES ('$data1','$like1')";
    if ($conn->query($sql) === TRUE) {
        echo "1데이터가 성공적으로 추가되었습니다.\n";
    } else {
        echo "오류: " . $sql . "<br>" . $conn->error;
    }
    $sql = "INSERT INTO pizza (label, value) VALUES ('$data2','$like2')";
    if ($conn->query($sql) === TRUE) {
        echo "2데이터가 성공적으로 추가되었습니다.\n";
    } else {
        echo "오류: " . $sql . "<br>" . $conn->error;
    }
    $sql = "INSERT INTO pizza (label, value) VALUES ('$data3','$like3')";
    if ($conn->query($sql) === TRUE) {
        echo "3데이터가 성공적으로 추가되었습니다.\n";
    } else {
        echo "오류: " . $sql . "<br>" . $conn->error;
    }
    $sql = "INSERT INTO pizza (label, value) VALUES ('$data4','$like4')";
    if ($conn->query($sql) === TRUE) {
        echo "4데이터가 성공적으로 추가되었습니다.\n";
    } else {
        echo "오류: " . $sql . "<br>" . $conn->error;
    }
    $sql = "INSERT INTO pizza (label, value) VALUES ('$data5','$like5')";
    if ($conn->query($sql) === TRUE) {
        echo "5데이터가 성공적으로 추가되었습니다.\n";
    } else {
        echo "오류: " . $sql . "<br>" . $conn->error;
    }
}

// MySQL 데이터베이스 연결 닫기
$conn->close();
?>