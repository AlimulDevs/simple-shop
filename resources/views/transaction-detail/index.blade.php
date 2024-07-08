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
            <h1 class="text-center">TABEL TRANSAKSI</h1>




        </div>


        <div class="card-body">


            <div class="table-responsive">
                <table class="table table-striped" id="example2">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Produk</th>
                            <th>Foto</th>
                            <th>total qty</th>
                            <th>Total Price</th>
                            <th>Varian</th>
                            <th>Ukuran</th>
                            <th>Pembayaran</th>
                            <th>Pengiriman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($data_transaction_detail as $dttd )
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$dttd->customer->user->name}}</td>
                            <td>{{$dttd->customer->address}}</td>
                            <td>{{$dttd->product->name}}</td>
                            <td><img src="{{$dttd->product->image_url}}" width="50px" height="50px" alt=""></td>
                            <td>{{$dttd->total_qty}}</td>
                            <td>{{$dttd->total_price}}</td>
                            <td>{{$dttd->varian}}</td>
                            <td>{{$dttd->size}}</td>
                            <td>{{$dttd->payment_method}}</td>
                            <td>{{$dttd->delivery}}</td>

                            <td>


                                <a href="/transaction-detail/delete/{{$dttd->id}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>

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