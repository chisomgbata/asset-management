<?php

namespace App\Models;


use App\Mail\Expiry;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Software extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function notifyExpiry()
    {
        $this->eolIn60Days();
        $this->eolIn30Days();
        $this->eolIn7Days();
    }

    public function eolIn60Days()
    {
        $count = $this->where('eol_date', '=', now()->addDays(60))->count();
        if (!!$count) {
            Mail::to(env('ADMIN_EMAIL'))->send(new Expiry(config('app.url') . "/software?tableFilters[expire_in_60][isActive]=true", 'Software', '60 days'));
        }
    }

    public function eolIn30Days()
    {
        $count = $this->where('eol_date', '=', now()->addDays(30))->count();
        if (!!$count) {
            Mail::to(env('ADMIN_EMAIL'))->send(new Expiry(config('app.url') . "/software?tableFilters[expire_in_30][isActive]=true", 'Software', '30 days'));
        }
    }

    public function eolIn7Days()
    {
        $count = $this->where('eol_date', '<=', now()->addDays(7))->count();
        if (!!$count) {
            Mail::to(env('ADMIN_EMAIL'))->send(new Expiry(config('app.url') . "/software?tableFilters[expire_in_7][isActive]=true", 'Software', '7 days OR less'));
        }

    }


}
