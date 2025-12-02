<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Pesanan;
use App\Models\Pelanggan;
use App\Models\Meja;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PesananControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function bisa_tambah_pesanan_melalui_form()
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

        $response = $this->post(route('pesanan.store'), [
            'pelanggan_id' => $pelanggan->id,
            'meja_id' => $meja->id,
            'tanggal_pesan' => '2025-12-01',
            'total_dp' => 50000
        ]);

        $response->assertRedirect(route('pesanan.index'));
        $this->assertDatabaseHas('pesanans', [
            'pelanggan_id' => $pelanggan->id,
            'meja_id' => $meja->id,
        ]);
    }

    /** @test */
    public function bisa_update_pesanan_melalui_form()
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

        $response = $this->put(route('pesanan.update', $pesanan->id), [
            'pelanggan_id' => $pelanggan->id,
            'meja_id' => $meja->id,
            'tanggal_pesan' => '2025-12-02',
            'total_dp' => 70000
        ]);

        $response->assertRedirect(route('pesanan.index'));
        $this->assertEquals(70000, $pesanan->fresh()->total_dp);
    }

    /** @test */
    public function bisa_hapus_pesanan_melalui_form()
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

        $response = $this->delete(route('pesanan.destroy', $pesanan->id));

        $response->assertRedirect(route('pesanan.index'));
        $this->assertDatabaseMissing('pesanans', ['id' => $pesanan->id]);
    }
}
