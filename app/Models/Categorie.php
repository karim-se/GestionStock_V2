<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categorie
 * 
 * @property int $id
 * @property string $NomCategorie
 * @property string|null $Description
 * 
 * @property Collection|Article[] $articles
 *
 * @package App\Models
 */
class Categorie extends Model
{
	protected $table = 'categorie';
	public $timestamps = false;

	protected $fillable = [
		'NomCategorie',
		'Description'
	];

	public function articles()
	{
		return $this->hasMany(Article::class, 'CategorieID');
	}
}
