<?php

namespace App\Enum;

enum CommonRole: int
{
/*    case Read = 'read';
    case Update = 'update';
    case Create = 'create';
    case Delete = 'delete';*/

    case Admin = 1;
    case Guest = 2;
}
