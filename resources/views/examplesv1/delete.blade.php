@include('layout.top')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="row">
        <div class="col-md-6 offset-md-3 text-center">Delete Data Examples V1</div>
      </div>
      <form name="dFormDelete" action="{{ route('examplesv1.deletePerform') }}" method="POST">
        @csrf
        <input type="hidden" class="form-control" id="id" name="id" placeholder="ID" required readonly>
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
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" readonly required>
        </div>
        <br>
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
      url: '/examplesv1/json/' + id,
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