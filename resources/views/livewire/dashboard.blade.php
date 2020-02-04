<div>
  <div class="px-12">
    <div class="w-64 flex  flex-col justify-center mx-auto my-4">
      <h1 class="text-red-500 text-3xl font-bold text-center mb-2">
        {{number_format($total_revenue,2)}}
      </h1>

      <p class="text-center">Total Revenue</p>
    </div>

    <div class="flex justify-center w-full h-128">
      <div class="w-1/2 h-128 mr-12">
        <canvas id="nationality"></canvas>
      </div>

      <div class="w-1/2 h-128">
        <canvas id="market_segment"></canvas>
      </div>
    </div>

    <div class="flex justify-start w-full h-128">
    
      <div class="w-1/2 h-128">
        <canvas id="room_type"></canvas>
      </div>
    </div>


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
          label: 'Nationality',
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
          label: 'Market Segment',
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
          label: 'Room Type',
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