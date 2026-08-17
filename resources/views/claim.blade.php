<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มแจ้งเคลมสินค้าชำรุด</title>
    <!-- Google Fonts: Inter & Noto Sans Thai -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Noto+Sans+Thai:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'Noto Sans Thai', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-tr from-pink-50 via-purple-50 to-amber-50 min-h-screen flex items-center justify-center p-4 md:p-8">

    <div class="max-w-lg w-full bg-white/90 backdrop-blur-md rounded-3xl shadow-2xl shadow-pink-100/60 p-6 md:p-10 border border-pink-100">
        <!-- Header ส่วนหัว -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-tr from-pink-400 to-purple-500 text-white rounded-2xl shadow-lg shadow-pink-200 mb-4 transform hover:rotate-6 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold bg-gradient-to-r from-pink-500 to-purple-600 bg-clip-text text-transparent">แจ้งเคลมสินค้าชำรุด</h2>
            <p class="text-slate-400 text-sm mt-1">กรอกรายละเอียดด้านล่างเพื่อให้เราช่วยดูแลคุณนะค้าบ/คะ ✨</p>
        </div>

        <!-- แสดงข้อความแจ้งเตือนเมื่อสำเร็จ -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl text-sm flex items-start gap-3 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('claim.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- 1. รหัสสินค้า (Serial Number) -->
            <div>
                <label for="serial_number" class="block text-sm font-semibold text-slate-700 mb-1.5">รหัสสินค้า (Serial Number) <span class="text-pink-500">*</span></label>
                <input type="text" 
                       id="serial_number" 
                       name="serial_number" 
                       value="{{ old('serial_number') }}"
                       placeholder="เช่น SN-12345678"
                       class="w-full px-4 py-3 bg-slate-50/50 border @error('serial_number') border-red-300 focus:ring-red-100 focus:border-red-400 @else border-slate-200 focus:ring-pink-100 focus:border-pink-400 @enderror rounded-2xl focus:outline-none focus:ring-4 transition duration-150 text-sm">
                
                @error('serial_number')
                    <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                        <span class="inline-block w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- 2. อีเมลผู้ติดต่อ -->
            <div>
                <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">อีเมลผู้ติดต่อ <span class="text-pink-500">*</span></label>
                <input type="text" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}"
                       placeholder="example@domain.com"
                       class="w-full px-4 py-3 bg-slate-50/50 border @error('email') border-red-300 focus:ring-red-100 focus:border-red-400 @else border-slate-200 focus:ring-pink-100 focus:border-pink-400 @enderror rounded-2xl focus:outline-none focus:ring-4 transition duration-150 text-sm">
                
                @error('email')
                    <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                        <span class="inline-block w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- 3. อาการชำรุด -->
            <div>
                <label for="issue" class="block text-sm font-semibold text-slate-700 mb-1.5">อาการชำรุด <span class="text-pink-500">*</span></label>
                <textarea id="issue" 
                          name="issue" 
                          rows="3" 
                          placeholder="อธิบายรายละเอียดอาการชำรุดเพิ่มเติม..."
                          class="w-full px-4 py-3 bg-slate-50/50 border @error('issue') border-red-300 focus:ring-red-100 focus:border-red-400 @else border-slate-200 focus:ring-pink-100 focus:border-pink-400 @enderror rounded-2xl focus:outline-none focus:ring-4 transition duration-150 text-sm">{{ old('issue') }}</textarea>
                
                @error('issue')
                    <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                        <span class="inline-block w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- 4. ระดับความเร่งด่วน -->
            <div>
                <label for="urgency" class="block text-sm font-semibold text-slate-700 mb-1.5">ระดับความเร่งด่วน <span class="text-pink-500">*</span></label>
                <select id="urgency" 
                        name="urgency" 
                        class="w-full px-4 py-3 bg-slate-50/50 border @error('urgency') border-red-300 focus:ring-red-100 focus:border-red-400 @else border-slate-200 focus:ring-pink-100 focus:border-pink-400 @enderror rounded-2xl focus:outline-none focus:ring-4 transition duration-150 text-sm">
                    <option value="">-- กรุณาเลือกระดับความเร่งด่วน --</option>
                    <option value="low" {{ old('urgency') == 'low' ? 'selected' : '' }}>🟢 ปกติ (Low)</option>
                    <option value="medium" {{ old('urgency') == 'medium' ? 'selected' : '' }}>🟡 ปานกลาง (Medium)</option>
                    <option value="high" {{ old('urgency') == 'high' ? 'selected' : '' }}>🔴 ด่วนมาก (High)</option>
                </select>
                
                @error('urgency')
                    <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                        <span class="inline-block w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- ปุ่มกดส่งข้อมูล -->
            <button type="submit" 
                    class="w-full bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 hover:opacity-95 text-white font-semibold py-3.5 rounded-2xl transition duration-200 text-sm shadow-lg shadow-pink-200 focus:outline-none focus:ring-4 focus:ring-pink-100 transform active:scale-95">
                💌 ส่งข้อมูลแจ้งเคลม
            </button>
        </form>
    </div>

</body>
</html>