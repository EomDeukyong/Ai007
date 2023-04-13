<?php
// MySQL 연결 설정
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pizza";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// MySQL에서 데이터 가져오기
$sql = "SELECT * FROM pizza";
$result = $conn->query($sql);

// 데이터를 저장할 배열 생성
$data = array();
$data[] = array('Pizza Name', 'Count');
while ($row = $result->fetch_assoc()) {
  $data[] = array($row['label'], (int)$row['value']);
}


// 연결 종료
$conn->close();

// 구글 차트 출력
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable(<?php echo json_encode($data); ?>);

      var options = {
        title: 'Pizza Count',
        pieHole: 0.4
      };

      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
  </script>
</head>
<body>
  <div id="chart_div" style="width: 900px; height: 500px;"></div>
</body>