<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Pelanggan;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PelangganTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function bisa_membuat_pelanggan_baru()
    {
        $pelanggan = Pelanggan::create([
            'nama' => 'Nada Berliani',
            'nomor_telepon' => '081234567890'
        ]);

        $this->assertDatabaseHas('pelanggans', [
            'nama' => 'Nada Berliani',
            'nomor_telepon' => '081234567890'
        ]);
    }

    /** @test */
    public function bisa_update_data_pelanggan()
    {
        $pelanggan = Pelanggan::create([
            'nama' => 'Nada Berliani',
            'nomor_telepon' => '081234567890'
        ]);

        $pelanggan->update(['nama' => 'Nada B. Putri']);

        $this->assertEquals('Nada B. Putri', $pelanggan->fresh()->nama);
    }

    /** @test */
    public function bisa_hapus_pelanggan()
    {
        $pelanggan = Pelanggan::create([
            'nama' => 'Nada Berliani',
            'nomor_telepon' => '081234567890'
        ]);

        $pelanggan->delete();

        $this->assertDatabaseMissing('pelanggans', ['nama' => 'Nada Berliani']);
    }
}
