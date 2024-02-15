<?php

namespace App\Http\Controllers;

use App\Models\MjuStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class MjuStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = MjuStudent::with('major')->paginate(10); // 10 จำนวนรายการ
        return response()->json(['message' => 'Student get successfully', 'data' => $students], 201);
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
        $validated = $request->validate([
            'student_code' => 'required|string|max:13',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'first_name_en' => 'required|string|max:50',
            'last_name_en' => 'required|string|max:50',
            'major_id' => 'required|exists:majors,major_id',
            'idcard' => 'required||digits:13',
            'birthdate' => 'required|date',
            'gender' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
        ]);
        MjuStudent::create($validated);
 
        return response()->json(['message' => 'Student created successfully','data'=>$validated], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,MjuStudent $mjuStudent)
    {
        //ส่งข้อมูลไปยังlaravel.log
        Log::info($request->mju);
        $student_code = $request->mju;
        $mjuStudent = MjuStudent::where('student_code',$student_code)->get();
        //ค้นหาข้อมูลที่ระบุ
        // $mjuStudent = MjuStudent::with('major')->limit(1)
        // ->get();
        return response()->json(
            ['message'=>'Student get successfully',
            'get Data by' => 'Student',
            'data'=> $mjuStudent],201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MjuStudent $student_code)
    {
        $validated = $request->validate([
            'student_code' => 'required|string|max:13',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'first_name_en' => 'required|string|max:50',
            'last_name_en' => 'required|string|max:50',
            'major_id' => 'required|exists:majors,major_id',
            'idcard' => 'required|digits:13',
            'birthdate' => 'required|date',
            'gender' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
        ]);

        $student_code->update($validated);

     //validated เป็นตัวแปรที่เก็บข้อมูล
    //mjuStudent เป็นอ็อบเจ็กต์
    //fill() ใช้สำหรับกำหนดค่าของฟิลด์ในโมเดล
    //save() ใช้สำหรับบันทึกข้อมูลที่ถูกเปลี่ยนแปลงลงในฐานข้อมูล

	// 3)   กลับไปยังหน้าจอแสดงผล (json)
    return response()->json(['message' => 'Student updated successfully', 'data' => $student_code], 200);
}

    /**
     * Remove the specified resource from storage.
     */

public function destroy(MjuStudent $student_code)
{
    $mjuStudent = MjuStudent::where('student_code', $student_code->student_code)->first();
    
    if ($mjuStudent) {
        $mjuStudent->delete();
        return response()->json([
            'message' => 'Student deleted successfully'
        ], 200);
    } else {
        return response()->json([
            'message' => 'Student not found'
        ], 404);
    }
}
}