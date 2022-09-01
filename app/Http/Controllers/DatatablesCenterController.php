<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DatatablesCenterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dataMembers()
    {
        $data = Member::with(['users'])->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('users.status', function (Member $member) {

                if ($member->users->status == "1") {
                    $return = "Active";
                } else {
                    $return = "Deactive";
                }
                return $return;
            })
            ->addColumn('action', function (Member $member) {

                $view = "<a class='badge bg-info btn' data-bs-role=" . route('members.show', $member->id) . " data-bs-target='#viewModal' data-bs-toggle='modal' id='view'>view</a>";

                $delete = null;
                if (Auth::user()->access === 'member') {
                    $delete = "<a class='badge bg-danger btn' data-bs-role=" . route('members.destroy', $member->id) . " id='delete'>delete</a>";
                }

                $edit = "<a class='badge bg-warning btn' href=" . route('members.edit', $member->id) . ">edit</a>";

                return $view . " " . " " . $edit . " " . $delete;
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function dataUsers()
    {
        $data = User::get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('status', '@if($status === 1){{"Actived"}} @else {{"Deactived"}} @endif')
            ->addColumn('action', function (User $user) {

                $view = "<a class='badge bg-info btn' data-bs-role=" . route('users.show', $user->id) . " data-bs-target='#viewModal' data-bs-toggle='modal' id='view'>view</a>";

                $delete = "<a class='badge bg-danger btn' data-bs-role=" . route('users.destroy', $user->id) . " id='edit'>delete</a>";

                $edit = "<a class='badge bg-warning btn' href=" . route('users.edit', $user->id) . ">edit</a>";

                return $view . " " . " " . $edit . " " . $delete;
            })
            ->rawColumns(['action'])
            ->toJson();
    }
}
