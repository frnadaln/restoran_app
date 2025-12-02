<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Pesanan;
use App\Models\Pelanggan;
use App\Models\Meja;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PesananTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function bisa_membuat_pesanan_baru()
    {
        $pelanggan = Pelanggan::create([
            'nama' => 'Nada Berliani',
            'nomor_telepon' => '081234567890'
        ]);

        $meja = Meja::create([
            'nomor_meja' => 1,
            'status' => 'tersedia',
            'kapasitas' => 4,
            'minimum_spent' => 100000
        ]);

        $pesanan = Pesanan::create([
            'pelanggan_id' => $pelanggan->id,
            'meja_id' => $meja->id,
            'tanggal_pesan' => '2025-12-01',
            'total_dp' => 50000
        ]);

        $this->assertDatabaseHas('pesanans', [
            'pelanggan_id' => $pelanggan->id,
            'meja_id' => $meja->id,
            'total_dp' => 50000
        ]);
    }

    /** @test */
    public function bisa_update_pesanan()
    {
        $pelanggan = Pelanggan::create([
            'nama' => 'Nada Berliani',
            'nomor_telepon' => '081234567890'
        ]);

        $meja = Meja::create([
            'nomor_meja' => 1,
            'status' => 'tersedia',
            'kapasitas' => 4,
            'minimum_spent' => 100000
        ]);

        $pesanan = Pesanan::create([
            'pelanggan_id' => $pelanggan->id,
            'meja_id' => $meja->id,
            'tanggal_pesan' => '2025-12-01',
            'total_dp' => 50000
        ]);

        $pesanan->update(['total_dp' => 70000]);

        $this->assertEquals(70000, $pesanan->fresh()->total_dp);
    }

    /** @test */
    public function bisa_hapus_pesanan()
    {
        $pelanggan = Pelanggan::create([
            'nama' => 'Nada Berliani',
            'nomor_telepon' => '081234567890'
        ]);

        $meja = Meja::create([
            'nomor_meja' => 1,
            'status' => 'tersedia',
            'kapasitas' => 4,
            'minimum_spent' => 100000
        ]);

        $pesanan = Pesanan::create([
            'pelanggan_id' => $pelanggan->id,
            'meja_id' => $meja->id,
            'tanggal_pesan' => '2025-12-01',
            'total_dp' => 50000
        ]);

        $pesanan->delete();

        $this->assertDatabaseMissing('pesanans', ['id' => $pesanan->id]);
    }
}
