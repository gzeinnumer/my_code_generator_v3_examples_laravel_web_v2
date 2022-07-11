<div class="row">
    <div class="col">
        <div class="mb-3">
            <label class="form-label">Chart Products</label>
            <div class="input-group mb-2">
                <input type="date" id="date_products" class="form-control" placeholder="17/06/2022">
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
        document.getElementById("date_products").value = getDate();

        chartproducts();
    });

    function chartproducts() {
        let date = document.getElementById("date_products").value;
        if (date == "") {
            date = "now";
        }
        $.ajax({
            url: '/products/chart/' + date,
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