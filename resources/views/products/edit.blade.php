@include('layout.top')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="row">
        <div class="col-md-6 offset-md-3 text-center">Update Data Products</div>
      </div>
      <form name="dFormEdit" action="{{ route('products.updatePerform') }}" method="POST">
        @csrf
        <input type="hidden" class="form-control" id="id" name="id" onchange="validate()" required readonly>
        <br>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="created_at">Created At</label>
              <input type="text" class="form-control" id="created_at" name="created_at" required readonly>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="updated_at">Updated At</label>
              <input type="text" class="form-control" id="updated_at" name="updated_at" required readonly>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
        </div>
        <div class="form-group">
          <label for="flag_active">Active</label>
          <select name="flag_active" class="form-control" aria-label="Default select example" required>
            <option disabled selected value="">Select Active</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
          </select>
        </div>
        <br>
        <div class="row justify-content-end p-2">
          <button type="submit" name="submit" class="btn btn-warning btn-sm">Edit</button>
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
    var myForm = document.forms['dFormEdit'];

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