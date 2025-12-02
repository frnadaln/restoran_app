<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Meja;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MejaTest extends TestCase
{
    use RefreshDatabase; // Reset DB tiap test

    /** @test */
    public function bisa_membuat_meja_baru()
    {
        $meja = Meja::create([
            'nomor_meja' => 1,
            'status' => 'tersedia',
            'kapasitas' => 4,
            'minimum_spent' => 100000
        ]);

        $this->assertDatabaseHas('mejas', [
            'nomor_meja' => 1,
            'status' => 'tersedia'
        ]);
    }

    /** @test */
    public function bisa_update_status_meja()
    {
        $meja = Meja::create([
            'nomor_meja' => 2,
            'status' => 'tersedia',
            'kapasitas' => 2,
            'minimum_spent' => 50000
        ]);

        $meja->update(['status' => 'terisi']);

        $this->assertEquals('terisi', $meja->fresh()->status);
    }

    /** @test */
    public function bisa_hapus_meja()
    {
        $meja = Meja::create([
            'nomor_meja' => 3,
            'status' => 'tersedia',
            'kapasitas' => 2,
            'minimum_spent' => 50000
        ]);

        $meja->delete();

        $this->assertDatabaseMissing('mejas', ['nomor_meja' => 3]);
    }
}
