<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Pelanggan;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PelangganControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function bisa_tambah_pelanggan_melalui_form()
    {
        $response = $this->post(route('pelanggan.store'), [
            'nama' => 'Nada Berliani',
            'nomor_telepon' => '081234567890'
        ]);

        $response->assertRedirect(route('pelanggan.index'));
        $this->assertDatabaseHas('pelanggans', ['nama' => 'Nada Berliani']);
    }

    /** @test */
    public function bisa_update_pelanggan()
    {
        $pelanggan = Pelanggan::create([
            'nama' => 'Nada Berliani',
            'nomor_telepon' => '081234567890'
        ]);

        $response = $this->put(route('pelanggan.update', $pelanggan->id), [
            'nama' => 'Nada B. Putri',
            'nomor_telepon' => '081234567890'
        ]);

        $response->assertRedirect(route('pelanggan.index'));
        $this->assertEquals('Nada B. Putri', $pelanggan->fresh()->nama);
    }

    /** @test */
    public function bisa_hapus_pelanggan()
    {
        $pelanggan = Pelanggan::create([
            'nama' => 'Nada Berliani',
            'nomor_telepon' => '081234567890'
        ]);

        $response = $this->delete(route('pelanggan.destroy', $pelanggan->id));

        $response->assertRedirect(route('pelanggan.index'));
        $this->assertDatabaseMissing('pelanggans', ['nama' => 'Nada Berliani']);
    }
}
