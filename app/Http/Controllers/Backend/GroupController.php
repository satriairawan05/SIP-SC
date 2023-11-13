<?php

namespace App\Http\Controllers\Backend;

use App\Models\Page;
use App\Models\Group;
use App\Models\GroupPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    /**
     * Constructor for LoginController.
     */
    public function __construct(private $name = 'Role Permission')
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.setting.role.index', [
            'name' => $this->name,
            'group' => Group::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.setting.role.create', [
            'name' => $this->name
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        return view('backend.setting.role.edit', [
            'name' => $this->name
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group, Page $page, GroupPage $groupPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }
}