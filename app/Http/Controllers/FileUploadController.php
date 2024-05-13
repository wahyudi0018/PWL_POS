<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload(){
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request){
        // return "Pemrosesan file upload di sini";

        // dump($request->berkas);

        // if($request->hasFile('berkas'))
        // {
        //     echo "path(): ".$request->berkas->path();
        //     echo "<br>";
        //     echo "extension(): ".$request->berkas->extension();
        //     echo "<br>";
        //     echo "getClientOriginalExtension(): ".$request->berkas->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getMimeType(): ".$request->berkas->getMimeType();
        //     echo "<br>";
        //     echo "getClientOriginalName(): ".$request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getSize(): ".$request->berkas->getSize();
        //     echo "<br>";
        // } else
        // {
        //     echo "Tidak ada berkas yang diupload";
        // }

        // $request->validate([
        //     'berkas'=>'required|file|image|max:5000',]);
        //     echo $request->berkas->getClientOriginalName()."lolos validasi";

        // $request->validate([
        //     'berkas'=>'required|file|image|max:5000',]);
        //     $extFile=$request->berkas->getClientOriginalName();
        //     $namaFile='web'.time().".".$extFile;
        //     $path=$request->berkas->storeAs('public',$namaFile);
        //     $pathBaru=asset('storage/'.$namaFile);
        //     echo "proses upload berhasil. file berada di: $path";
        //     echo "<br>";
        //     echo "Tampilan link:<a href='$pathBaru'>$pathBaru</a>";

        // $request->validate([
        //     'berkas'=>'required|file|image|max:5000',]);
        //     $extFile=$request->berkas->getClientOriginalName();
        //     $namaFile='web'.time().".".$extFile;
        //     $path=$request->berkas->move('gambar',$namaFile);
        //     $path=str_replace("\\","//", $path);
        //     echo "Variabel path berisi:$path<br>";
        //     $pathBaru=asset('gambar/'.$namaFile);
        //     echo "proses upload berhasil. file berada di: $path";
        //     echo "<br>";
        //     echo "Tampilan link:<a href='$pathBaru'>$pathBaru</a>";

        $request->validate([
            'nama_file' => 'required',
            'berkas' => 'required|file|image|max:5000'
        ]);

        $namaFile = $request->nama_file;
        $extfile = $request->berkas->getClientOriginalExtension();
        $namaFileWithExt = $namaFile . '.' . $extfile;
        $path = $request->berkas->move(public_path('gambar'), $namaFileWithExt);
        $pathBaru = asset('gambar/' . $namaFileWithExt);

        echo"Gambar berhasil di upload ke $namaFileWithExt";
        return "<img src='$pathBaru' alt='Uploaded Image'>";
    }
}
