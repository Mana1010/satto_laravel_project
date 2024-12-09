<x-app-layout>


<div class="flex flex-col py-3 px-5 h-full">
    <div class=" pt-5 pb-2 sticky top-0 border-b border-zinc-300 z-[99999] bg-white">
    <h1 class="text-[#F70062] font-semibold text-3xl">STUDENT MANAGEMENT</h1>
</div>
@if(session('success'))
<script>
    alert({{session('success')}})
</script>
@endif
    <form  method="POST" action="{{route('student.store')}}" class="w-full shadow pt-7 px-3 flex flex-col space-y-5 py-6">
        @csrf
        <h1 class="text-[#F70062] font-semibold text-md text-start">ADD NEW STUDENT</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 w-full">
            <div class="flex flex-col space-y-1">
                <label for="name" class="text-sm font-bold text-[#F46C8D]">Full Name</label>
                <input required type="text" id="name" name="name" class="p-2 rounded-sm border border-black/10"/>
            </div>
            <div class="flex flex-col space-y-1">
                <label for="email" class="text-sm font-bold text-[#F46C8D]">Email</label>
                <input required type="email" id="email" name="email" class="p-2 rounded-sm border border-black/10"/>
            </div>
            <div class="flex flex-col space-y-1">
                <label for="phone" class="text-sm font-bold text-[#F46C8D]">Phone</label>
                <input required type="number" id="phone" name="phone" class="p-2 rounded-sm border border-black/10"/>
            </div>
            <div class="flex flex-col space-y-1">
                <label for="address" class="text-sm font-bold text-[#F46C8D]">Address</label>
                <input required type="text" id="address" name="address" class="p-2 rounded-sm border border-black/10"/>
            </div>
        </div>
        <button type="submit" class="md:w-1/2 w-full py-2 rounded-md bg-[#F35555] text-white font-bold mx-auto">ADD STUDENT</button>
    </form>
    <div class="pt-5 space-y-2">
        <h1 class="text-[#F70062] font-semibold text-md text-start">LIST OF STUDENTS</h1>
    <table class="w-full border border-slate-900/50 pt-2">
        <thead>
        <tr>
            <th class="p-3 bg-[#F46C8D] text-white">#</th>
            <th class="p-3 bg-[#F46C8D] text-white">Name</th>
            <th class="p-3 bg-[#F46C8D] text-white">Email</th>
            <th class="p-3 bg-[#F46C8D] text-white">Phone No.</th>
            <th class="p-3 bg-[#F46C8D] text-white">Address</th>
            <th class="p-3 bg-[#F46C8D] text-white">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $key => $student)
            <tr class="text-center">
                <td class="p-3 border border-[#F70062]">{{$key + 1}}</td>
                <td class="p-3 border border-[#F70062]">{{$student->name}}</td>
                <td class="p-3 border border-[#F70062]">{{$student->email}}</td>
                <td class="p-3 border border-[#F70062]">{{$student->phone}}</td>
                <td class="p-3 border border-[#F70062]">{{$student->address}}</td>
                <td class="border border-slate-900/50">
                <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-white bg-pink-600 py-1.5 px-4 rounded-md text-[0.7rem]">
                      DELETE
                    </button>
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
</x-app-layout>
