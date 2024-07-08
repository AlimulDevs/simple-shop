@extends('template.index')

@section('content')

<style>
    #bulan-filter {
        max-width: 200px;
    }
</style>

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
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-exit"></i></button>
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

    <div class="card">
        <div class="card-header">
            <h1 class="text-center">TABEL CUSTOMER</h1>

            <div class="text-right">
                <a class="btn btn-primary" href="/customer/create-index">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            </div>


        </div>


        <div class="card-body">


            <div class="table-responsive">
                <table class="table table-striped" id="example2">
                    <thead class="text-center">
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No.HP</th>
                            <th>Address</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($data_customer as $dtc )
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$dtc->user->name}}</td>
                            <td>{{$dtc->user->email}}</td>
                            <td>{{$dtc->no_hp}}</td>
                            <td>{{$dtc->address}}</td>


                            <td>


                                <a href="/customer/delete/{{$dtc->user->id}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>

                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>



</div>
@endsection