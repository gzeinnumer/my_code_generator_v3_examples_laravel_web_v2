@include('layout.top')
<div class="container">
  <div class="row p-2">
    <a href="{{ route('products.createShow') }}" type="submit" class="btn btn-primary btn-sm">Add</a>
  </div>
  <div class="row">
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
      {{session('sukses')}}
    </div>
    @endif

    @include('products.index-paging')

    @include('products.index-tables')

  </div>
</div>
@include('layout.bottom')