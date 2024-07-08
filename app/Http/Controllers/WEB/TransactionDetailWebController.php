<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionDetailWebController extends Controller
{
    public function delete($id)
    {

        $data_transaction_detail = TransactionDetail::find($id);
        $data_transaction_detail->delete();
        return redirect('/transaction-detail/index');
    }
}
