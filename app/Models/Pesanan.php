<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pesanan
 *
 * Model untuk tabel 'pesanans'
 * Mengatur data pesanan pelanggan restoran
 *
 * @property int $id
 * @property int $pelanggan_id
 * @property int $meja_id
 * @property string $tanggal_pesan
 * @property int $total_dp
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan create(array $attributes)
 */
class Pesanan extends Model
{
    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'pelanggan_id',
        'meja_id',
        'tanggal_pesan',
        'total_dp'
    ];

    /**
     * Relasi Pesanan ke Pelanggan
     * Satu pesanan dimiliki oleh satu pelanggan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    /**
     * Relasi Pesanan ke Meja
     * Satu pesanan ditempatkan di satu meja
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }
}
