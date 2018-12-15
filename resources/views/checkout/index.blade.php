@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 10
    });

  } );
</script>

@stop
@extends('layouts.global')
@section('content')
<div class="row">

  <div class="col-lg-12">
    @if (Session::has('message'))
    <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
    @endif
  </div>
</div>
<div class="row" style="margin-top: 20px;">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">

      <div class="card-body">
        <h4 class="card-title">Data CheckOut</h4>
        
        <div class="table-responsive">
          <table class="table table-striped" id="table">
            <thead>
              <tr>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Telephone</th>
                <th>Alamat Satu</th>
                <th>Alamat Dua</th>
                <th>Negara</th>
                <th>Kota</th>
                <th>Daerah</th>
                <th>Kode Pos</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($checkouts as $data)
              <tr>
                  <td>{{$data->nama_depan}}</td>
                  <td>{{$data->nama_belakang}}</td>
                  <td>{{$data->telephone}}</td>
                  <td>{{$data->alamat_satu}}</td>
                  <td>{{$data->alamat_dua}}</td>
                  <td>{{$data->negara}}</td>
                  <td>{{$data->kota}}</td>
                  <td>{{$data->daerah}}</td>
                  <td>{{$data->kode_pos}}</td>
                  <td>
                 <div class="btn-group dropdown">

              <a class="btn btn-warning" href="{{ route('checkout.edit',$data->id) }}">Edit</a>&nbsp&nbsp&nbsp&nbsp
              <form method="post" action="{{ route('checkout.destroy',$data->id) }}">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">

                <button onclick="return konfirmasi()"type="submit" class="btn btn-danger">Delete</button>
                <script>
                  function konfirmasi(){
                    tanya = confirm("Yakin ingin menghapus data?");
                    if(tanya == true) return true;
                    else return false;
                  }
                </script>
              </form>
            </div>
        </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{--  {!! $checkouts->links() !!} --}}
    </div>
  </div>
</div>
</div>
@endsection