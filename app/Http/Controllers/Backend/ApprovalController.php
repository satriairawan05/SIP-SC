<?php

namespace App\Http\Controllers\Backend;

use App\Models\Approval;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApprovalController extends Controller
{
    /**
     * Constructor for Controller.
     */
    public function __construct(private $name = 'Approval', public $create = 0, public $read = 0, public $update = 0, public $delete = 0)
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
                if (!request()->input('departemen_id')) {
                    return view('backend.setting.approval.index', [
                        'name' => $this->name,
                        'departemen' => \App\Models\Departemen::all(),
                        'pages' => $this->get_access($this->name, auth()->user()->group_id)
                    ]);
                } else {
                    return view('backend.setting.approval.index2', [
                        'name' => $this->name,
                        'departemen' => \App\Models\Departemen::where('departemen_id', request()->input('departemen_id'))->first(),
                        'approval' => Approval::where('departemen_id', request()->input('departemen_id'))->get(),
                        'departemens' => \App\Models\Departemen::where('departemen_id', request()->input('departemen_id'))->get(),
                        'users' => \App\Models\User::where('departemen_id', request()->input('departemen_id'))->get(),
                        'pages' => $this->get_access($this->name, auth()->user()->group_id)
                    ]);
                }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->get_access_page();
        if ($this->create == 1) {
            try {
                //
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
    public function show(Approval $approval)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Approval $approval)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Approval $approval)
    {
        $this->get_access_page();
        if ($this->update == 1) {
            try {
                //
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
    public function destroy(Approval $approval)
    {
        $this->get_access_page();
        if ($this->delete == 1) {
            try {
                //
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('failed', 'You not Have Authority!');
        }
    }
}
