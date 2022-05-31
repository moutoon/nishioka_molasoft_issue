<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReservationControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function 予約登録の際、時間が重複すると予約ができない()
    {
        $rsv1 = Reservation::create([
            'studio' => 'スタジオA',
            'band_id' => 1,
            'date' => '2022-05-17',
            'start_time' => '9:00',
            'end_time' => '12:00',
        ]);

        $rsv2 = Reservation::create([
            'studio' => 'スタジオA',
            'band_id' => 2,
            'date' => '2022-05-17',
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);

        $postData = [
            'studio' => 'スタジオA',
            'band_id' => 3,
            'date' => '2022-05-17',
            'start_time' => '10:00',
            'end_time' => '16:00',
        ];

        $this->post('api/reservation_create', $postData)->assertOk();
        $this->assertEquals(2, Reservation::count());
        $this->assertDatabaseMissing('reservations', $postData);
    }

    /**
     * @test
     */
    public function 同じスタジオで予約時間が重複していない場合()
    {
        $rsv1 = Reservation::create([
            'studio' => 'スタジオA',
            'band_id' => 1,
            'date' => '2022-05-17',
            'start_time' => '9:00',
            'end_time' => '12:00',
        ]);

        $rsv2 = Reservation::create([
            'studio' => 'スタジオA',
            'band_id' => 2,
            'date' => '2022-05-17',
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);

        $postData = [
            'studio' => 'スタジオA',
            'band_id' => 3,
            'date' => '2022-05-17',
            'start_time' => '19:00',
            'end_time' => '21:00',
        ];

        $this->post('api/reservation_create', $postData)->assertStatus(201);
        $this->assertEquals(3, Reservation::count());
        $this->assertDatabaseHas('reservations', $postData);
    }

    /**
     * @test
     */
    public function 予約時間が重複しているがスタジオが違うので予約できる場合()
    {
        $rsv1 = Reservation::create([
            'studio' => 'スタジオA',
            'band_id' => 1,
            'date' => '2022-05-17',
            'start_time' => '9:00',
            'end_time' => '12:00',
        ]);

        $rsv2 = Reservation::create([
            'studio' => 'スタジオA',
            'band_id' => 2,
            'date' => '2022-05-17',
            'start_time' => '15:00',
            'end_time' => '19:00',
        ]);

        $postData = [
            'studio' => 'スタジオB',
            'band_id' => 3,
            'date' => '2022-05-17',
            'start_time' => '10:00',
            'end_time' => '16:00',
        ];

        $this->post('api/reservation_create', $postData)->assertStatus(201);
        $this->assertEquals(3, Reservation::count());
        $this->assertDatabaseHas('reservations', $postData);
    }
}
