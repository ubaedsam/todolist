<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todolist Sederhana</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="container mx-auto">
    <div class="flex space-x-2 justify-end pt-4 pb-3 pl-10 mr-10">
        <a href="{{ route('pelajar.create') }}" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Tambah Data</a>
    </div>
    @if(session()->has('success'))
    <div class="p-5 flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
      <p>{{ session('success') }}</p>
    </div>
    @endif
    <h1 class="text-3xl text-blue-600/100 text-center pt-5 font-bold">
        Website Todolist Sederhana (Pelajar)
    </h1>
    <div class="flex justify-center pt-5">
        <table class="border-separate border border-blue-600">
            <thead>
              <tr>
                <th class="border border-blue-600 p-5">Nomor</th>
                <th class="border border-blue-600 p-5">Nama</th>
                <th class="border border-blue-600 p-5">Jenis Kelamin</th>
                <th class="border border-blue-600 p-5">Jurusan</th>
                <th class="border border-blue-600 p-5">Kelas</th>
                <th class="border border-blue-600 p-5">Hobby</th>
                <th class="border border-blue-600 p-5">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pelajars as $pelajar)
              <tr>
                <td class="border border-blue-600 text-center p-2">{{ $pelajar->id }}</td>
                <td class="border border-blue-600 text-center p-2">{{ $pelajar->nama }}</td>
                <td class="border border-blue-600 text-center p-2">{{ $pelajar->jk }}</td>
                <td class="border border-blue-600 text-center p-2">{{ $pelajar->jurusan->jurusan }}</td>
                <td class="border border-blue-600 text-center p-2">{{ $pelajar->jurusan->kelas }}</td>
                <td class="border border-blue-600 p-2">
                  @foreach ($pelajar->hobis as $item)
                  {{$item->hobi ?? '' }},
                  @endforeach
                </td>
                <td class="border border-blue-600 text-center p-2">
                  <a href="{{ url('edit/'.$pelajar->id) }}" class="inline-block px-6 py-2.5 bg-yellow-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg transition duration-150 ease-in-out">Ubah</a>
                  <form action="{{ url('delete/'.$pelajar->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full mt-3 inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out" onclick="return confirm('Apakah kamu serius ingin menghapus data pelajar ini ?')">Hapus</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  </div>
</body>
</html>