<div>
  <h1>
    {{number_format($total_revenue,2)}}
  </h1>

  <div class="flex">
    <div class="w-144 h-128">
      <canvas id="nationality"></canvas>
    </div>

    <div class="w-144 h-128">
      <canvas id="market_segment"></canvas>
    </div>
  </div>

  <div class="w-144 h-128">
    <canvas id="room_type"></canvas>
  </div>



</div>


@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {

    const nationalityContext = document.getElementById('nationality');
    const nationalityChart = new Chart(nationalityContext, {
      type: 'bar',
      data: {
        labels: @this.get('nationality').labels,
        datasets: [{
          label: '# of Votes',
          data: @this.get('nationality').count,
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });

    var marketSegmentContext = document.getElementById('market_segment');
    var marketSegmentChart = new Chart(marketSegmentContext, {
      type: 'bar',
      data: {
        labels: @this.get('market_segment').labels,
        datasets: [{
          label: '# of Votes',
          data: @this.get('market_segment').count,
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });

    var roomTypeContext = document.getElementById('room_type');
    var roomTypeChart = new Chart(roomTypeContext, {
      type: 'bar',
      data: {
        labels: @this.get('room_type').labels,
        datasets: [{
          label: '# of Votes',
          data: @this.get('room_type').count,
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  });
</script>
@endpush