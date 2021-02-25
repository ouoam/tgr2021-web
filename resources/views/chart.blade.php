<html>
  <head>
    <title>Time Scale Point Data</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="{{ mix('/js/utils.js') }}"></script>
    <link rel="stylesheet" href="{{ mix('/css/style.css') }}" />
  </head>
  <body data-gr-c-s-loaded="true">
    <div>
      <div class="chartjs-size-monitor">
        <div class="chartjs-size-monitor-expand"><div class=""></div></div>
        <div class="chartjs-size-monitor-shrink"><div class=""></div></div>
      </div>
      <canvas
        id="canvas"
        style="display: block; height: 90vh; width: 100vw"
        class="chartjs-render-monitor"
      ></canvas>
    </div>
  </body>
  <script>
    var color = Chart.helpers.color;
    var config = {
      type: "line",
      data: {
        datasets: [
          {
            label: "lime normal",
            backgroundColor: color(window.chartColors.green)
              .alpha(0.5)
              .rgbString(),
            borderColor: window.chartColors.green,
            fill: false,
            data: @json($normal),
          },
          {
            label: "lime small",
            backgroundColor: color(window.chartColors.orange)
              .alpha(0.5)
              .rgbString(),
            borderColor: window.chartColors.orange,
            fill: false,
            data: @json($small),
          },
          {
            label: "pingpong",
            backgroundColor: color(window.chartColors.red)
              .alpha(0.5)
              .rgbString(),
            borderColor: window.chartColors.red,
            fill: false,
            data: @json($pingpong),
          },
        ],
      },
      options: {
        responsive: true,
        title: {
          display: true,
          text: "Chart of item in conveyor belt",
        },
        scales: {
          xAxes: [
            {
              type: "time",
              display: true,
              scaleLabel: {
                display: true,
                labelString: "Date",
              },
              ticks: {
                major: {
                  fontStyle: "bold",
                  fontColor: "#FF0000",
                },
              },
            },
          ],
          yAxes: [
            {
              display: true,
              scaleLabel: {
                display: true,
                labelString: "value",
              },
            },
          ],
        },
        legend: {
          display: true,
          onClick: () => {},
        },
      },
    };
    window.onload = function () {
      var ctx = document.getElementById("canvas").getContext("2d");
      window.myLine = new Chart(ctx, config);
    };
  </script>
</html>
