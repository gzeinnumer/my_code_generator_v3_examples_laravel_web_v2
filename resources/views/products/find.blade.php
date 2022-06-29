@include('layout.top')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="row">
        <div class="col-md-6 offset-md-3 text-center">Detail Data Products</div>
      </div>
      <form name="dFormFind">
        <input type="text" class="form-control" id="id" name="id" placeholder="ID" required readonly>
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Name" required readonly>
        </div>
        <div class="form-group">
          <label for="flag_active" class="form-label">Active</label>
          <select name="flag_active" class="form-control" aria-label="Default select example" required disabled>
            <option disabled selected value="">Select Active</option>
            <option value="1">1</option>
            <option value="0">0</option>
          </select>
        </div>
        <div class="row justify-content-end p-2">
          <a type="button" href="{{ route('products.index') }}" class="btn btn-info btn-sm">Reset</a>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function() {
    const currentLocation = window.location + "";
    const id = currentLocation.split('/');
    loadData(id[5]);
  });

  function loadData(id) {
    var myForm = document.forms['dFormFind'];

    for (var i = 0; i < myForm.length; i++) {
      var d = myForm.elements[i];
      if (d.name != "_token") {
        d.value = "";
      }
    }

    $.ajax({
      url: '/products/json/' + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {

        for (var i = 0; i < myForm.length; i++) {
          var d = myForm.elements[i];
          if (d.name != "_token") {
            if (d.name == "") {

            } else {
              d.value = data[d.name];
            }
          }
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Gagal mendapatkan data');
      }
    });
  }
</script>
@include('layout.bottom')