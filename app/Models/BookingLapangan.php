<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingLapangan extends Model
{
   protected $fillable=[
      'id',
      'user_id',
      'jam_awal',
      'jam_akhir',
      'bukti_bayar',
      'lapangan_futsal_id',
];
   protected $table='booking_lapangans';


   public function  jadwal()
   {
      return $this->belongsTo(LapanganFutsal::class,'lapangan_futsal_id','id');
   }
   public function  user()
   {
      return $this->belongsTo(User::class);
   }
}
