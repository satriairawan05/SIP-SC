<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Constructor for Controller.
     */
    public function __construct(private $name = 'User', public $create = 0, public $read = 0, public $update = 0, public $delete = 0)
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
                if (auth()->user()->group_id == 1) {
                    $user = User::leftJoin('departemens', 'users.departemen_id', '=', 'departemens.departemen_id')->leftJoin('groups','users.group_id','groups.group_id')->get();
                } else {
                    $user = User::leftJoin('departemens', 'users.departemen_id', '=', 'departemens.departemen_id')->leftJoin('groups','users.group_id','groups.group_id')->where('users.id', auth()->user()->id)->get();
                }

                return view('backend.setting.account.index', [
                    'name' => $this->name,
                    'users' => $user,
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
                return view('backend.setting.account.create', [
                    'name' => $this->name,
                    'departemen' => \App\Models\Departemen::all(),
                    'group' => \App\Models\Group::all()
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
                $validated = Validator::make($request->all(), [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'password' => ['required', 'string', 'min:3', 'confirmed']
                ]);

                if (!$validated->fails()) {
                    User::create([
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'password' => bcrypt($request->input('password')),
                        'jabatan' => $request->input('jabatan'),
                        'nik' => $request->input('nik'),
                        'lokasi_kerja' => $request->input('lokasi_kerja'),
                        'tgl_masuk' => $request->input('tgl_masuk'),
                        'group_id' => $request->input('group_id'),
                        'departemen_id' => $request->input('departemen_id'),
                    ]);

                    return redirect('user')->with('success', 'Added Account Successfully');
                } else {
                    return redirect('dashboard')->with('failed', $validated->getMessageBag());
                }
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->get_access_page();
        if ($this->update == 1) {
            try {
                $this->get_access_page();
                if ($this->update == 1) {
                    return view('backend.setting.account.edit', [
                        'name' => $this->name,
                        'user' => $user,
                        'departemen' => \App\Models\Departemen::all(),
                        'group' => \App\Models\Group::all()
                    ]);
                } else {
                    return redirect()->back()->with('failed', 'You not Have Authority!');
                }
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
    public function update(Request $request, User $user)
    {
        $this->get_access_page();
        if ($this->update == 1) {
            try {
                $validated = Validator::make($request->all(), [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'password' => ['required', 'string', 'min:3', 'confirmed']
                ]);

                if (!$validated->fails()) {
                    User::where('id', $user->id)->update([
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'password' => bcrypt($request->input('password')),
                        'jabatan' => $request->input('jabatan'),
                        'nik' => $request->input('nik'),
                        'lokasi_kerja' => $request->input('lokasi_kerja'),
                        'tgl_masuk' => $request->input('tgl_masuk'),
                        'group_id' => $request->input('group_id'),
                        'departemen_id' => $request->input('departemen_id'),
                    ]);

                    return redirect('user')->with('success', 'Updated Account Successfully');
                } else {
                    return redirect('dashboard')->with('failed', $validated->getMessageBag());
                }
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
    public function destroy(User $user)
    {
        $this->get_access_page();
        if ($this->delete == 1 && $user->id != 1) {
            try {
                $data = $user->find(request()->segment(2));
                User::destroy($data->id);

                return redirect('user')->with('success', 'Deleted Account Successfully');
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        } else {
            return redirect()->back()->with('failed', 'You not Have Authority!');
        }
    }
}
