<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Meja;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MejaControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function bisa_tambah_meja_melalui_form()
    {
        $response = $this->post(route('meja.store'), [
            'nomor_meja' => 5,
            'status' => 'tersedia',
            'kapasitas' => 4,
            'minimum_spent' => 100000
        ]);

        $response->assertRedirect(route('meja.index'));
        $this->assertDatabaseHas('mejas', ['nomor_meja' => 5]);
    }

    /** @test */
    public function bisa_update_meja()
    {
        $meja = Meja::create([
            'nomor_meja' => 6,
            'status' => 'tersedia',
            'kapasitas' => 2,
            'minimum_spent' => 50000
        ]);

        $response = $this->put(route('meja.update', $meja->id), [
            'nomor_meja' => 6,
            'status' => 'terisi',
            'kapasitas' => 2,
            'minimum_spent' => 50000
        ]);

        $response->assertRedirect(route('meja.index'));
        $this->assertEquals('terisi', $meja->fresh()->status);
    }

    /** @test */
    public function bisa_hapus_meja()
    {
        $meja = Meja::create([
            'nomor_meja' => 7,
            'status' => 'tersedia',
            'kapasitas' => 4,
            'minimum_spent' => 100000
        ]);

        $response = $this->delete(route('meja.destroy', $meja->id));

        $response->assertRedirect(route('meja.index'));
        $this->assertDatabaseMissing('mejas', ['nomor_meja' => 7]);
    }
}
