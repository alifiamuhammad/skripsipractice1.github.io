<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSiswa;
use App\Models\jurusan;
use App\Models\kelas;
use Illuminate\Support\Facades\Hash;
class DataSiswaController extends Controller
{
    
    public function index()
{
	$posts = DataSiswa::sortable()->paginate();
  
    return view('dt_siswa',['data' =>$posts]);
	
    
}
public function detailsiswa($id){

    return view('detail_siswa',[
            'post' => DataSiswa::find($id)
        ]);
        }
         /**
     * Write code on Method
     *
     * @return response()
     */
    
public function tambah_data_siswa(){
    $data['jurusans'] = jurusan::get(["Nama_Jurusan", "id"]);
        return view('tambah_data_siswa', $data);
                }
public function store(Request $request)
                {
                    $this->validate($request, [
                        'NIS'=> 'required|max:15',
                        'Nama'=> 'required',
                        'Alamat'=> 'required',
                        'Kelas_id'=> 'required',
                        'Email'=> 'required',
                        'NoHP'=> 'required|max:13',
                    ]);

                    $nm = $request->Foto;
                    $namaFile = $nm->getClientOriginalname();
                    $nm->move(public_path().'/images',$namaFile);
                    DataSiswa::create([
                        'NIS'     => $request->NIS,
                        'Nama'   => $request->Nama,
                        'Alamat' => $request->Alamat,
                        'Kelas_id' => $request->Kelas_id,
                        'Foto' => $request->Foto=$namaFile,
                        'Email' => $request->Email,
                        'Jurusan_id' => $request->Jurusan_id,
                        'password' => Hash::make($request['password']),
                        'NoHP' => $request->NoHP,
                        
                    ]);
            
                    //redirect to index
                    return redirect('dt_siswa')->with(['success' => 'Data Berhasil Disimpan!']);
                    
                    $messages = array(
                        'same'    => 'The :attribute and :other must match.',
                        'size'    => 'The :attribute must be exactly :size.',
                        'between' => 'The :attribute must be between :min - :max.',
                        'in'      => 'The :attribute must be one of the following types: :values',
                    );
                    
                }  

 
public function kelas(Request $request)
    {
        $data['kelas'] = kelas::where("jurusan_id", $request->jurusan_id)
                                ->get(["Nama", "id"]);
  
        return response()->json($data);
    }
             
}
