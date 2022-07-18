<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\factory;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $factory = factory::get();
        $employee = User::get();
        $user = [];
        foreach ($employee as $employeeS) {
            $Datauser = factory::find($employeeS->factory);
            $employeeS->fac_category =  $Datauser->fac_name;
            array_push($user, $employeeS);
        }
        return view('components.backend.employee.home', ['factory' => $factory, 'employee' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'role' => $request->role,
            'factory' => $request->factory,
            'password' => Hash::make($request->password),
        ]);


        return redirect()->route('manage-employee.index')->with('message', 'เพิ่มพนักงานสำเร็จ')->with('message-status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = explode(",", $id);
        $employee = User::find($data[0]);


        if ($employee) {
            $Datauser = factory::find($employee->id);
            $employee->fac_category =  $Datauser->fac_name;
            $factory = factory::get();
            return view('components.backend.employee.page', ['factory' => $factory, 'employee' => $employee, 'type' => $data[1]]);
        } else {
            return redirect()->route('manage-employee.index')->with('message', 'ไม่มีข้อมูลพนักงานคนดังกล่าว')->with('message-status', 'error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->role = $request->role;
        $user->factory = $request->factory;
        if ($request->password != '') {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('manage-employee.index')->with('message', 'แก้ไขข้อมูลพนักงานสำเร็จ')->with('message-status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = new User();
        $status = $User->destroy($id);

        if ($status) {
            return redirect()->route('manage-employee.index')->with('message', 'ลบข้อมูลพนักงานสำเร็จ')->with('message-status', 'success');
        } else {
            return redirect()->route('manage-employee.index')->with('message', 'ไม่พบผู้ใช้นี้ในระบบ')->with('message-status', 'error');
        }
    }
}
