@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Data Buku</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
   <a href="{{route('input.create')}}" class="btn btn-primary" >Add</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>ID</th>
    <th>Judul</th>
    <th>Kategori</th>
    <th>Tahun Terbit</th>
    <th>Penerbit</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($data as $row)
   <tr>
    <td>{{$row['id']}}</td>
    <td>{{$row['judul']}}</td>
    <td>{{$row['kategori']}}</td>
    <td>{{$row['tahunTerbit']}}</td>
    <td>{{$row['penerbit']}}</td>
    <td><a href="{{action('Form_Control@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    <td>
      <form action="{{route('input.destroy', $row['id'])}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" name="button">Delete</button>
      </form>
    </td>
   </tr>
   @endforeach
  </table>
 </div>
</div>

@endsection