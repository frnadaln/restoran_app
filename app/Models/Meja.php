<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Meja
 *
 * Model untuk tabel 'mejas'
 * Mengatur data meja di restoran
 *
 * @property int $id
 * @property int $nomor_meja
 * @property string $status
 * @property int|null $kapasitas
 * @property int|null $minimum_spent
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Meja create(array $attributes)
 */
class Meja extends Model
{
    // Kolom yang bisa diisi secara massal
    protected $fillable = ['nomor_meja', 'status', 'kapasitas', 'minimum_spent'];

    /**
     * Relasi Meja ke Pesanan
     * Satu meja bisa memiliki banyak pesanan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}
