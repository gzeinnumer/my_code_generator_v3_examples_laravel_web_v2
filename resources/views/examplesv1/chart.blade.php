
<div class="row">
    <div class="col">
        <div class="mb-3">
            <label class="form-label">Chart Examples V1</label>
            <div class="input-group mb-2">
                <input type="date" id="date_examplesv1" class="form-control" placeholder="17/06/2022">
                <button class="btn" type="button" onclick="chart()">Cari</button>
            </div>
        </div>
    </div>
</div>
<div>
    <canvas id="chart"></canvas>
</div>
<script type="text/javascript">
    $(function() {
        document.getElementById("date_examplesv1").value = getDate();

        chartexamplesv1();
    });

    function chartexamplesv1() {
        let date = document.getElementById("date_examplesv1").value;
        if (date == "") {
            date = "now";
        }
        $.ajax({
            url: '/examplesv1/chart/' + date,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                let idChart = 'chart';
                $('#' + idChart + '').replaceWith($('<canvas id="' + idChart + '"></canvas>'));
                toChartV2("bar", data, idChart);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Gagal mendapatkan data');
            }
        });
    }
</script>