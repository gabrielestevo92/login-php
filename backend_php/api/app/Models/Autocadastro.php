<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autocadastro extends Model
{
    use HasFactory;

    protected $table = 'autocadastros'; // Nome da tabela no banco de dados

    protected $fillable = ['email', 'password']; // Campos que podem ser preenchidos em massa
}
