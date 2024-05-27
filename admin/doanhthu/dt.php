
<?php
    $thongke=thong_ke();
    $html_thongke='';
    foreach($thongke as $item){
        extract($item);
    $html_thongke.= '
        '.$DoanhThu.',
    ';
    }
?>
<canvas id="myChart" style="width:100%;max-width:700px"></canvas>
<script>
var xValues = ["Đã tiếp nhận","Đang vân chuyển","Giao hàng thành công"];

var yValues = [<?=$html_thongke?>];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
 
];

new Chart("myChart", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Biểu đồ thể hiện tình trạng đơn hàng"
    }
  }
});
</script>