function getinfo() {
            var check = new XMLHttpRequest();
            check.onload = function() {
                var data = (this.responseText);
                return (data);
            };
            check.open("get", "usage.php", false);
            check.send();
            return (check.onload());
        }
function load(){
        var chart = new SmoothieChart({
                millisPerPixel: 100,
                maxValueScale: 0.92,
                tooltip: true,
                maxValue: 100,
                minValue: 0
            }),
            canvas = document.getElementById('smoothie-chart'),
            series = new TimeSeries();
            setInterval(function() {
            series.append(new Date().getTime(), getinfo());
            }, 2500);

        chart.addTimeSeries(series, {
            lineWidth: 2,
            strokeStyle: '#00ff00'
        });
        chart.streamTo(canvas, 2000);
}