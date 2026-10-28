<?php

namespace App\Controllers;

use App\Models\SiswaModel;

class Home extends BaseController
{
    // 1. Menampilkan seluruh data siswa (Checkpoint 4)
    public function index(): string
    {
        $siswaModel = new SiswaModel();
        $data['siswa'] = $siswaModel->getSiswa();

        return view('siswa_view', $data);
    }

    // 2. Menyimpan data siswa baru (Checkpoint 5)
    public function tambah()
    {
        $siswaModel = new SiswaModel();

        $siswaModel->save([
            'nis'   => $this->request->getPost('nis'),
            'nama'  => $this->request->getPost('nama'),
            'kelas' => $this->request->getPost('kelas'),
        ]);

        return redirect()->to(base_url());
    }

    // 3. Menghapus data siswa berdasarkan ID (Checkpoint 6)
    public function hapus($id)
    {
        $siswaModel = new SiswaModel();

        $siswaModel->delete($id);

        return redirect()->to(base_url());
    }

    // 4. Memperbarui / Edit data siswa berdasarkan ID (Checkpoint 7)
    public function edit($id)
    {
        $siswaModel = new SiswaModel();

        // Memperbarui data berdasarkan ID dan inputan form
        $siswaModel->update($id, [
            'nis'   => $this->request->getPost('nis'),
            'nama'  => $this->request->getPost('nama'),
            'kelas' => $this->request->getPost('kelas'),
        ]);

        // Kembali ke halaman utama
        return redirect()->to(base_url());
    }
}