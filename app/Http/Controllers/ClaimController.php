<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClaimController extends Controller
{
    // แสดงหน้าฟอร์มเคลมสินค้า
    public function index()
    {
        return view('claim');
    }

    // ตรวจสอบความถูกต้องของข้อมูล (Validation Rules)
    public function store(Request $request)
    {
        $request->validate([
            'serial_number' => 'required|string|max:50',
            'email'         => 'required|email',
            'issue'         => 'required|string|min:10',
            'urgency'       => 'required|in:low,medium,high',
        ], [
            // ข้อความแจ้งเตือนภาษาไทยเมื่อเกิดข้อผิดพลาด
            'serial_number.required' => 'กรุณากรอกรหัสสินค้า (Serial Number)',
            'serial_number.max'      => 'รหัสสินค้าต้องมีความยาวไม่เกิน 50 ตัวอักษร',
            'email.required'         => 'กรุณากรอกอีเมลผู้ติดต่อ',
            'email.email'            => 'รูปแบบอีเมลไม่ถูกต้อง (ตัวอย่าง: example@email.com)',
            'issue.required'         => 'กรุณาระบุอาการชำรุด',
            'issue.min'              => 'กรุณาอธิบายอาการชำรุดอย่างน้อย 10 ตัวอักษร',
            'urgency.required'       => 'กรุณาเลือกระดับความเร่งด่วน',
            'urgency.in'             => 'ระดับความเร่งด่วนไม่ถูกต้อง',
        ]);

        // เมื่อผ่านการตรวจสอบ สามารถประมวลผลต่อได้ที่นี่
        return back()->with('success', 'ส่งข้อมูลแจ้งเคลมสินค้าเรียบร้อยแล้ว!');
    }
}