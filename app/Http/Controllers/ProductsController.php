<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;
// composer require yajra/laravel-datatables-oracle:"~9.0"

class ProductsController extends Controller
{
    //list
    public function index()
    {
        $data = ProductsModel::all();
        $sent = [
            'data' => $data
        ];
        return view('products.index', $sent);
    }

    //add
    public function createShow()
    {
        return view('products.add');
    }

    public function createPerform(Request $r)
    {
        ProductsModel::create($r->all());
        return redirect('/products')->with('sukses', 'Data successfully added');
    }

    //detail
    public function findShow()
    {
        return view('products.find');
    }

    //update
    public function updateShow()
    {
        return view('products.edit');
    }

    public function updatePerform(Request $r)
    {
        $data = ProductsModel::find($r->id);
        $data->update($r->all());
        return redirect('/products')->with('sukses', 'Data successfully updated');
    }

    //delete
    public function deleteShow($id)
    {
        $delete = ProductsModel::find($id);
        $sent = [
            'delete' => $delete
        ];
        return view('products.delete', $sent);
    }

    public function deletePerform(Request $r)
    {
        $data = ProductsModel::find($r->id);
        $data->delete();
        return redirect('/products')->with('sukses', 'Data berhasil deleted');
    }

    public function getDataById($id)
    {
        $find = ProductsModel::where(["id" => $id])->first();
        return json_encode($find);
    }

    //dataTables
    public function dataTables(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->getData($request);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = "<td>" .
                        '    <a href="/products/find/' . $row->id . '" class="btn btn-info btn-sm ">Detail</a>' .
                        '    <a href="/products/update/' . $row->id . '" class="btn btn-warning btn-sm ">Edit</a>' .
                        '    <a href="/products/delete/' . $row->id . '" class="btn btn-danger btn-sm">Delete</a>' .
                        "</td>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getData(Request $request, $flag_active = "")
    {
        $date_start = $request->get("date_start");
        $date_end = $request->get("date_end");

        $data = ProductsModel::select();

        if ($date_start != "" && $date_end != "") {
            $data = $data->wherebetween("products.created_at", array($date_start . " 00:00:00", $date_end . " 23:59:59"));
        } else if ($date_start != "") {
            $data = $data->where("products.created_at", ">=", $date_start . " 00:00:00");
        } else if ($date_end != "") {
            $data = $data->where("products.created_at", "<=", $date_end . " 23:59:59");
        }

        $data = $data->get();;

        return $data;
    }
}
