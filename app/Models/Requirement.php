<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    protected $table = 'berkas';

    protected $fillable = [
        'user_id',
        'wedding_id',
        'n1',
        'n2',
        'n3',
        'n4',
        'n5',
        'n7',
        'bukti_pembayaran',
        'surat_despensasi',
        'u_kk',
        'u_surat_kesehatan',
        'u_akta_lahir',
        'u_surat_izin_komandan',
        'u_akta_cerai_kematian',
        'u_surat_izin_kedutaan',
        'u_paspor',
        'p_kk',
        'p_surat_kesehatan',
        'p_akta_lahir',
        'p_surat_izin_komandan',
        'p_akta_cerai_kematian',
        'p_surat_izin_kedutaan',
        'p_paspor',
    ];
}
