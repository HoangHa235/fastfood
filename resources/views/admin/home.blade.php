@extends('admin.main')

@section('content')
<canvas id="myChart" width="100" height="45"></canvas>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
var data = <?= json_encode($data); ?>;
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
        datasets: [{
            label: 'Thống kê đơn hàng',
            data: data,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'green',
            ],
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
 
@endsection