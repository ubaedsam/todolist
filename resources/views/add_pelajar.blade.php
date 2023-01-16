<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todolist Sederhana</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <section class="pt-5 pb-32">
        <div class="container">
          <div class="flex space-x-2 justify-end pt-4 pb-3 pl-10 mr-10">
            <a href="/pelajar" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Kembali</a>
          </div>
          <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-5">
                <h1 class="text-3xl text-blue-600/100 text-center font-bold">
                    Tambah Data Todolist (Pelajar)
                </h1>
            </div>
          </div>
          <form method="post" action="{{ route('pelajar.store') }}">
            @csrf
            <div class="w-full lg:w-2/3 lg:mx-auto">
              <div class="w-full px-4 mb-4">
                <label for="nama" class="text-base font-bold text-blue-600/100">Nama</label>
                <input type="text" id="nama" name="nama" class="w-full bg-slate-200 p-3 rounded-md" />
              </div>
              <div class="w-full px-4 mb-4">
                <label for="jk" class="text-base font-bold text-blue-600/100">Jenis Kelamin</label>
                <select name="jk" class="w-full bg-slate-200 p-3 rounded-md">
                    <option selected>Pilih Jenis Kelamin</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="w-full px-4 mb-4">
                <label for="jurusan" class="text-base font-bold text-blue-600/100">Jurusan</label>
                <select name="jurusan_id" class="w-full bg-slate-200 p-3 rounded-md">
                    <option selected>Pilih Jurusan</option>
                    @foreach ($jurusans as $jurusan)
                        <option value="{{ $jurusan->id }}">{{ $jurusan->jurusan }} / 
                            {{ ($jurusan->kelas) }}
                        </option>
                    @endforeach
                </select>
              </div>
              <div class="w-full px-4 mb-4">
                <div class="input-group">
                    <label for="hobi" class="text-base font-bold text-blue-600/100">Hobi</label>
                    <input type="text" id="hobi" name="hobi[]" class="w-full bg-slate-200 p-3 rounded-md" />
                    <button type="button" class="w-full inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out add_hobi">Tambah</button>
                </div>
                <div id="extra-hobi">

                </div>
              </div>
              <div class="w-full px-4">
                <button type="submit" class="w-full inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </section>

      <script>
        const add = document.querySelectorAll(".input-group .add_hobi")
        add.forEach(function(e){
            e.addEventListener('click',function(){
                let element = this.parentElement
                let newElement = document.createElement('div')
                    newElement.classList.add('input-group')
                    newElement.innerHTML = `<label for="hobi" class="text-base font-bold text-blue-600/100">Hobi</label><input type="text" id="hobi" name="hobi[]" class="pt-5 w-full bg-slate-200 p-3 rounded-md" />
                    <button type="button" class="w-full inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out remove">Hapus</button>`
                    document.getElementById('extra-hobi').appendChild(newElement)
            })
        })

        callEvent()

        function callEvent(){
            document.querySelector('form').querySelectorAll('.remove').forEach(function(remove){
                        remove.addEventListener('click',function(elmClick){
                            elmClick.target.parentElement.remove()
                        })
                    })
        }
      </script>
</body>
</html>