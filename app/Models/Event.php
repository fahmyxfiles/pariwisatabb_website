<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $dates = ['start_registration', 'end_registration', 'start_event', 'end_event'];

    protected $with = ['files'];
    public function files()
    {
        return $this->hasMany(EventFile::class);
    }
    //'internal','internal_gforms','external_contact','external_url'
    public function getRegistrarTypeText()
    {
        $result = [
            'internal' => 'Formulir Situs',
            'internal_gforms' => 'Google Form',
            'external_contact' => 'Hubungi Kontak',
            'external_url' => 'Formulir Luar Situs',
        ];
        return $result[$this->registrar_type];
    }
}
