<?php

/**
 * Generated By GZeinNumerCodeGenerator
 * www.github.com/gzeinnumer
 * at 2022-12-17 13:01:10
 * zip name 20221217130110_examples_v1_ywqvU8gSxW.zip
 */

namespace App\Http\Controllers;

use App\Models\ExamplesV1Model;
use Illuminate\Http\Request;
use stdClass;

use Yajra\DataTables\Facades\DataTables;
// composer require yajra/laravel-datatables-oracle:"~9.0"

class ExamplesV1Controller extends Controller
{
    //list
    public function index()
    {
        $data = ExamplesV1Model::all();
        $sent = [
            ';' => $data
        ];
        return view('examplesv1.index', $sent);
    }

    //add
    public function createShow()
    {
        return view('examplesv1.add');
    }

    public function createPerform(Request $r)
    {
        $data = new ExamplesV1Model();
        $data->name = $r->name;
        $data->save();
        return redirect('/examplesv1')->with('sukses', 'Data successfully added');
    }

    //detail
    public function findShow($id)
    {
        return view('examplesv1.find');
    }

    //update
    public function updateShow($id)
    {
        return view('examplesv1.edit');
    }

    public function updatePerform(Request $r)
    {
        $data = ExamplesV1Model::find($r->id);
        $data->update($r->all());
        return redirect('/examplesv1')->with('sukses', 'Data successfully updated');
    }

    //delete
    public function deleteShow($id)
    {
        $delete = ExamplesV1Model::find($id);
        $sent = [
            'delete' => $delete
        ];
        return view('examplesv1.delete', $sent);
    }

    public function deletePerform(Request $r)
    {
        $data = ExamplesV1Model::find($r->id);
        $data->delete();
        return redirect('/examplesv1')->with('sukses', 'Data berhasil deleted');
    }

    public function getDataById($id)
    {
        $find = ExamplesV1Model::where(["id" => $id])->first();
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
                        '    <a href="/examplesv1/find/' . $row->id . '" class="btn btn-info btn-sm ">Detail</a>' .
                        '    <a href="/examplesv1/update/' . $row->id . '" class="btn btn-warning btn-sm ">Edit</a>' .
                        '    <a href="/examplesv1/delete/' . $row->id . '" class="btn btn-danger btn-sm">Delete</a>' .
                        "</td>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getData(Request $request)
    {
        $date_start = $request->get("date_start");
        $date_end = $request->get("date_end");

        $data = ExamplesV1Model::select();

        if ($date_start != "" && $date_end != "") {
            $data = $data->wherebetween("examples_v1.created_at", array($date_start . " 00:00:00", $date_end . " 23:59:59"));
        } else if ($date_start != "") {
            $data = $data->where("examples_v1.created_at", ">=", $date_start . " 00:00:00");
        } else if ($date_end != "") {
            $data = $data->where("examples_v1.created_at", "<=", $date_end . " 23:59:59");
        }

        $data = $data->get();
        return $data;
    }

    public function getChart($date)
    {
        $colors = ["#206bc4", "#4299e1", "#4263eb", "#ae3ec9", "#d6336c", "#d63939", "#f76707", "#f59f00", "#74b816", "#2fb344", "#0ca678", "#17a2b8", "#1e293b", "#626976"];
        shuffle($colors);

        $values = ExamplesV1Model::select()->get();

        $labels = [];
        $data1 = [];
        $color = [];
        $colorCount = 0;

        for ($i = 0; $i < count($values); $i++) {
            $labels[] = $values[$i]->id;
            $data1[] = ExamplesV1Model::where(['id' => $values[$i]->id])->get()->count();
            $colorCount++;
            if ($colorCount == count($colors)) {
                $colorCount = 0;
            }
        }

        $datasets = [];

        $d = new stdClass();
        $d->label = "Data 1";
        $d->backgroundColor = $color;
        $d->borderColor = $color;
        $d->data = $data1;
        $datasets[] = $d;

        return [
            "labels" => $labels,
            "datasets" => $datasets
        ];
    }
}
