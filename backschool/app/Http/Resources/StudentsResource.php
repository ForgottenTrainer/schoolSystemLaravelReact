<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentsResource extends JsonResource
{
    public static $wrap = false;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre ,
            'edad' => $this->edad,
            'imagen' => $this->imagen,
            'email' => $this->email,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'cuatrimestre' => $this->cuatrimestre,
            'genero' => $this->genero,
            'created_at' => $this->created_at ? $this->created_at->format('Y-m-d H:i:s') : null        
        ];
    }
}
