<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Orang
 *
 * Kelas dasar untuk semua entitas yang memiliki nama dan nomor telepon
 */
class Orang extends Model
{
    protected $fillable = ['nama', 'nomor_telepon'];

    /**
     * Dapatkan info dasar entitas (nama dan telepon)
     *
     * @return string
     */
    public function getInfo()
    {
        return "{$this->nama} ({$this->nomor_telepon})";
    }
}

/**
 * Class Pelanggan
 *
 * Model untuk tabel 'pelanggans'
 * Pelanggan mewarisi Orang sehingga bisa gunakan atribut dan metode dasar
 *
 * @property int $id
 * @property string $nama
 * @property string $nomor_telepon
 */
class Pelanggan extends Orang
{
    protected $fillable = ['nama', 'nomor_telepon']; // ✅ langsung tulis ulang

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }

    public function getInfo()
    {
        return "Pelanggan: {$this->nama} ({$this->nomor_telepon})";
    }
}
