@extends('template.index')

@section('content')



<div class="container">

    </h3>
    @if ($messege = Session::get('success_delete'))
    <div class="alert alert-danger alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_add'))
    <div class="alert alert-success alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('failed_add'))
    <div class="alert alert-danger alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_edit'))
    <div class="alert alert-warning alert-dismissible text-white" role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_delete'))
    <div class="alert alert-danger alert-dismissible text-white" role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Product Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @foreach ($data_product_category as $dtpc)


        <form method="POST" action="/product-category/edit" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <input type="hidden" name="id" value="{{$dtpc->id}}" id="">
                <input type="hidden" name="role" value="dosen">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input value="{{$dtpc->name}}" type="text" name="name" class="form-control" id="name" placeholder="Masukkan Nama">
                </div>




            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </div>
        </form>
        @endforeach
    </div>

</div>



</div>
@endsection