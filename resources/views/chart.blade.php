<html>
  <head>
    <title>Time Scale Point Data</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="./js/utils.js"></script>
    <link rel="stylesheet" href="./css/styles.css" />
  </head>
  <body data-gr-c-s-loaded="true">
    <div style="width: 75%">
      <div class="chartjs-size-monitor">
        <div class="chartjs-size-monitor-expand"><div class=""></div></div>
        <div class="chartjs-size-monitor-shrink"><div class=""></div></div>
      </div>
      <canvas
        id="canvas"
        style="display: block; height: 450px; width: 901px"
        width="1802"
        height="900"
        class="chartjs-render-monitor"
      ></canvas>
    </div>
    <br />
    <br />
  </body>
  <script>
    function newDate(days) {
      return moment().add(days, "d").toDate();
    }

    function newDateString(days) {
      return moment().add(days, "d").unix();
    }

    var color = Chart.helpers.color;
    var config = {
      type: "line",
      data: {
        datasets: [
          {
            label: "Dataset with string point data",
            backgroundColor: color(window.chartColors.red)
              .alpha(0.5)
              .rgbString(),
            borderColor: window.chartColors.red,
            fill: false,
            data: @json($list),
          },
        ],
      },
      options: {
        responsive: true,
        title: {
          display: true,
          text: "Chart.js Time Point Data",
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