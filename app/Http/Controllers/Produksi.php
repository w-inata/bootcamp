<?php

namespace App\Http\Controllers;

use App\Models\mProduksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Produksi extends Controller
{
    function index()
    {
        $datatable_column = [
            ["data" => "no"],
            ["data" => "kode_produksi"],
            ["data" => "lokasi"],
            ["data" => "tanggal_mulai"],
            ["data" => "tanggal_selesai"],
            ["data" => "status"],
            ["data" => "publish"],
        ];
        $data = [
            'datatable_column' => $datatable_column
        ];
        return view('produksi.produksiList', $data);
    }

    function datatable(Request $request)
    {
        $total_data = mProduksi::count();
        $limit = $request->input(key: 'lenght');
        $start = $request->input(key: 'start');
        $order_column = 'id';
        $order_type = $request->input(key: 'order.0.dir');

        $data_list = mProduksi
            ::with([
                'lokasi'
            ])
            ->offset($start)
            ->Limit($limit)
            ->orderBy($order_column, $order_type)
            ->get();

        $total_data++;

        $data = array();
        foreach ($data_list as $key => $row) {
            $key++;
            if ($order_type == 'asc') {
                $no = $key + $start;
            } else {
                $no = $total_data = $key - $start;
            }

            $nestedData['no'] = $no;
            $nestedData['kode_produksi'] = $row->kode_produksi;
            $nestedData['lokasi'] = $row->lokasi->lokasi;
            $nestedData['tanggal_mulai'] = $row->tgl_mulai_produksi;
            $nestedData['tanggal_selesai'] = $row->tgl_selesai_produksi;
            $nestedData['status'] = $row->status;
            $nestedData['publish'] = $row->publish;

            $data[] = $nestedData;
        }

        $json_data = array(
            "draw" => intval($request->input(key: "draw")),
            "recordsTotal" => intval($total_data - 1),
            "recordsFoltered" => intval($total_data - 1),
            "data" => $data,
            "all_request" => $request->all()
        );
        return $json_data;
    }
}
