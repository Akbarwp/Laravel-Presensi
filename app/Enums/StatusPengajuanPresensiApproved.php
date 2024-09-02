<?php

namespace App\Enums;

enum StatusPengajuanPresensiApproved: int
{
    case PENDING = 0;
    case DISETUJUI = 1;
    case DITOLAK = 2;
}
