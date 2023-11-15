<?php

namespace App\Http\Controllers\Backend;

use App\Models\Cuti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CutiController extends Controller
{
    /**
     * Constructor for Controller.
     */
    public function __construct(private $name = 'Cuti', public $create = 0, public $read = 0, public $update = 0, public $delete = 0)
    {
        //
    }

    /**
     * Generate Access for Controller.
     */
    public function get_access_page()
    {
        $userRole = $this->get_access($this->name, auth()->user()->group_id);

        foreach ($userRole as $r) {
            if ($r->page_name == $this->name) {
                if ($r->action == 'Create') {
                    $this->create = $r->access;
                }

                if ($r->action == 'Read') {
                    $this->read = $r->access;
                }

                if ($r->action == 'Update') {
                    $this->update = $r->access;
                }

                if ($r->action == 'Delete') {
                    $this->delete = $r->access;
                }
            }
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->get_access_page();
        if ($this->read == 1) {
            try {
                return view('backend.setting.cuti.index',[
                    'name' => $this->name,
                    'cuti' => Cuti::all(),
                    'pages' => $this->get_access($this->name, auth()->user()->group_id)
                ]);
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('failed', 'You not Have Authority!');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->get_access_page();
        if ($this->create == 1) {
            try {
                return view('backend.setting.cuti.create',[
                    'name' => $this->name
                ]);
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('failed', 'You not Have Authority!');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->get_access_page();
        if ($this->create == 1) {
            try {
                Cuti::create([
                    'cuti_jenis' => $request->input('cuti_jenis'),
                    'cuti_jumlah' => $request->input('cuti_jumlah'),
                ]);

                return redirect()->to(route('cuti.index'))->with('success','Added successfully!');
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('failed', 'You not Have Authority!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuti $cuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuti $cuti)
    {
        $this->get_access_page();
        if ($this->update == 1) {
            try {
                return view('backend.setting.cuti.edit',[
                    'name' => $this->name,
                    'cuti' => $cuti,
                    'pages' => $this->get_access($this->name, auth()->user()->group_id)
                ]);
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('failed', 'You not Have Authority!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuti $cuti)
    {
        $this->get_access_page();
        if ($this->update == 1) {
            try {
                Cuti::where('cuti_id',$cuti->cuti_id)->update([
                    'cuti_jenis' => $request->input('cuti_jenis'),
                    'cuti_jumlah' => $request->input('cuti_jumlah'),
                ]);

                return redirect()->to(route('cuti.index'))->with('success','Updated successfully!');
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('failed', 'You not Have Authority!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuti $cuti)
    {
        $this->get_access_page();
        if ($this->delete == 1) {
            try {
                $data = $cuti->find(request()->segment(2));
                Cuti::destroy($data->cuti_id);

                return redirect()->back()->with('success','Deleted successfully!');
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('failed', 'You not Have Authority!');
        }
    }
}
