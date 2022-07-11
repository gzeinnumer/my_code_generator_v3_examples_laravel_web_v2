@include('layout.top')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="row">
        <div class="col-md-6 offset-md-3 text-center">Add Data Products</div>
      </div>
      <form action="{{ route('products.createPerform') }}" method="POST">
        @csrf
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
          <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@include('layout.bottom')