<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArchiveController extends Controller
{
    /**
     * Constructor for Controller.
     */
    public function __construct(private $name = 'Archive', public $read = 0)
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
            if ($r->action == 'Read') {
                $this->read = $r->access;
            }
        }
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $this->get_access_page();
        if ($this->read == 1) {
            try {
                if (!$request->input('departemen_id')) {
                    return view('backend.archive.index', [
                        'name' => $this->name,
                        'departemen' => \App\Models\Departemen::all()
                    ]);
                } else {
                    return view('backend.archive.index2', [
                        'name' => $this->name,
                        'departemen' => \App\Models\Departemen::where('departemen_id', $request->input('departemen_id'))->first(),
                        'surat' => \App\Models\SuratCuti::where('departemen_id', $request->input('departemen_id'))->whereNotNull('sc_no_surat')->get()
                    ]);
                }
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('failed', 'You not Have Authority!');
        }
    }
}
