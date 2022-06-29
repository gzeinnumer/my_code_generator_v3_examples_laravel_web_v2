@include('layout.top')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="row">
        <div class="col-md-6 offset-md-3 text-center">Delete Data Products</div>
      </div>
      <form name="dFormDelete" action="{{ route('products.deletePerform') }}" method="POST">
        @csrf
        <input type="text" class="form-control" id="id" name="id" placeholder="ID" readonly required>
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Name" readonly required>
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
          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
    var myForm = document.forms['dFormDelete'];

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