<?php

namespace App\Http\Controllers\Backend;

use App\Models\SuratCuti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuratCutiController extends Controller
{
    /**
     * Constructor for Controller.
     */
    public function __construct(private $name = 'Surat Cuti', public $create = 0, public $read = 0, public $approval = 0, public $update = 0, public $delete = 0)
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

                if ($r->action == 'Approval') {
                    $this->approval = $r->access;
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
                    return view('backend.surat_cuti.index', [
                        'name' => $this->name,
                        'departemen' => \App\Models\Departemen::all(),
                        'pages' => $this->get_access($this->name, auth()->user()->group_id),
                    ]);
                } else {
                    return view('backend.surat_cuti.index2', [
                        'name' => $this->name,
                        'cuti' => SuratCuti::select(['surat_cutis.*', 'pics.name as pic_name', 'pts.name as pt_name'])->leftJoin('users as pics', 'surat_cutis.pic_id', '=', 'pics.id')->leftJoin('users as pts', 'surat_cutis.pt_id', '=', 'pts.id')->where('surat_cutis.departemen_id', request()->input('departemen_id'))->get(),
                        'departemen' => \App\Models\Departemen::select('departemen_name')->where('departemen_id', request()->input('departemen_id'))->first(),
                        'pages' => $this->get_access($this->name, auth()->user()->group_id),
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
        $this->get_access_page();
        if ($this->create == 1) {
            try {
                return view('backend.surat_cuti.create', [
                    'name' => $this->name,
                    'cuti' => \App\Models\Cuti::all(),
                    'departemen' => \App\Models\Departemen::all(),
                    'pic' => \App\Models\User::whereNot('id', 1)->get(),
                    'pt' => \App\Models\User::whereNot('id', 1)->get(),
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
                SuratCuti::create([
                    'pic_id' => $request->input('pic_id'),
                    'pt_id' => $request->input('pt_id'),
                    'cuti_id' => $request->input('cuti_id'),
                    'departemen_id' => $request->input('departemen_id'),
                    'sc_tgl_ambil_start' => $request->input('sc_tgl_ambil_start'),
                    'sc_tgl_ambil_end' => $request->input('sc_tgl_ambil_end'),
                    'sc_tgl_kembali' => $request->input('sc_tgl_kembali'),
                    'sc_alamat_cuti' => $request->input('sc_alamat_cuti'),
                    'sc_no_hp' => $request->input('sc_no_hp'),
                    'sc_tgl_surat' => \Carbon\Carbon::now(),
                    'sc_jumlah_cuti' => (strtotime($request->input('sc_tgl_ambil_end')) - strtotime($request->input('sc_tgl_ambil_start'))) / 86400,
                    'sc_approved_step' => 1,
                ]);

                return redirect()->to(route('surat_cuti.index'))->with('success', 'Added Succesfully!');
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
    public function show(SuratCuti $suratCuti)
    {
        $this->get_access_page();
        if ($this->read == 1) {
            try {
                return view('backend.surat_cuti.document', [
                    'name' => $this->name,
                ]);
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('failed', 'You not Have Authority!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratCuti $suratCuti)
    {
        $this->get_access_page();
        if ($this->update == 1 && $suratCuti->pic_id == auth()->user()->id) {
            try {
                return view('backend.surat_cuti.edit', [
                    'name' => $this->name,
                    'surat' => $suratCuti->find(request()->segment(2)),
                    'cuti' => \App\Models\Cuti::all(),
                    'departemen' => \App\Models\Departemen::all(),
                    'pic' => \App\Models\User::whereNot('id', 1)->get(),
                    'pt' => \App\Models\User::whereNot('id', 1)->get(),
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
    public function update(Request $request, SuratCuti $suratCuti)
    {
        $this->get_access_page();
        if ($this->update == 1 && $suratCuti->pic_id == auth()->user()->id) {
            try {
                SuratCuti::where('sc_id', $suratCuti->sc_id)->update([
                    'pic_id' => $request->input('pic_id'),
                    'pt_id' => $request->input('pt_id'),
                    'cuti_id' => $request->input('cuti_id'),
                    'departemen_id' => $request->input('departemen_id'),
                    'sc_tgl_ambil_start' => $request->input('sc_tgl_ambil_start'),
                    'sc_tgl_ambil_end' => $request->input('sc_tgl_ambil_end'),
                    'sc_tgl_kembali' => $request->input('sc_tgl_kembali'),
                    'sc_alamat_cuti' => $request->input('sc_alamat_cuti'),
                    'sc_no_hp' => $request->input('sc_no_hp'),
                    'sc_tgl_surat_rev' => \Carbon\Carbon::now()
                ]);

                return redirect()->to(route('surat_cuti.index'))->with('success', 'Updated Succesfully!');
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('failed', 'You not Have Authority!');
        }
    }

    /**
     * Update the approval resource in storage.
     */
    public function approval(Request $request, SuratCuti $suratCuti)
    {
        $this->get_access_page();
        if ($this->approval == 1) {
            try {
                $pic = \App\Models\User::where('id', $suratCuti->pic_id)->select('name')->first();
                $stepData = null;

                $latestApproval = \App\Models\Approval::where('sc_id', $suratCuti->sc_id)->latest('app_ordinal')->first();
                if($request->input('sc_dipsosisi') == 'Accepted'){
                    \App\Models\Approval::where('sc_id', $suratCuti->sc_id)->where('user_id', auth()->user()->id)->update([
                        'app_status' => $request->input('sc_disposisi'),
                        'app_date' => \Carbon\Carbon::now()
                    ]);

                    if($latestApproval->app_ordinal == $suratCuti->sc_approved_step){
                        $stepData = $suratCuti->sc_approved_step;
                    } else {
                        $stepData = $suratCuti->sc_approved_step + 1;
                    }

                } else {
                    \App\Models\Approval::where('sc_id', $suratCuti->sc_id)->where('user_id', auth()->user()->id)->update([
                        'app_status' => $request->input('sc_disposisi'),
                        'app_date' => \Carbon\Carbon::now()
                    ]);

                    $stepData = 1;
                }

                SuratCuti::where('sc_id', $suratCuti->sc_id)->update([
                    'sc_disposisi' => $request->input('sc_disposisi'),
                    'sc_remark' => $request->input('sc_remark'),
                    'sc_approved_step' => $stepData
                ]);

                return redirect()->back()->with('success', 'Surat Cuti '. $pic->name .' telah anda '. $suratCuti->sc_disposisi .'!');
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
    public function destroy(SuratCuti $suratCuti)
    {
        $this->get_access_page();
        if ($this->delete == 1 && $suratCuti->pic_id == auth()->user()->id) {
            try {
                SuratCuti::destroy($suratCuti->sc_id);

                return redirect()->back()->with('success', 'deleted Succesfully!');
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('failed', 'You not Have Authority!');
        }
    }
}
