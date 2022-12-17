@include('layout.top')
<div class="container">
  <br>
  <div class="row">
    <div class="col">

    </div>
    <div class="col-auto">
      <a href="{{ route('examplesv1.createShow') }}" type="submit" class="btn btn-primary btn-sm">Add</a>
    </div>
  </div>
  <br>
  <div class="row">
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
      {{session('sukses')}}
    </div>
    @endif
  </div>

  @include('examplesv1.index-paging')

  <br>

  @include('examplesv1.chart')

  <br>

  @include('examplesv1.index-tables')

</div>
@include('layout.bottom')