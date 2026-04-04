<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Etat
 * 
 * @property int $id
 * @property string $etat
 * 
 * @property Collection|CommandeAchat[] $commande_achats
 * @property Collection|CommandeVente[] $commande_ventes
 *
 * @package App\Models
 */
class Etat extends Model
{
	protected $table = 'Etat';
	public $timestamps = false;

	protected $fillable = [
		'etat'
	];

	public function commande_achats()
	{
		return $this->hasMany(CommandeAchat::class, 'etatID');
	}

	public function commande_ventes()
	{
		return $this->hasMany(CommandeVente::class, 'etatID');
	}
}
