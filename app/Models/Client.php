<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * 
 * @property int $ClientID
 * @property string $NomClient
 * @property string|null $Adresse
 * @property string|null $Telephone
 * @property string|null $Email
 * 
 * @property Collection|CommandeVente[] $commande_ventes
 *
 * @package App\Models
 */
class Client extends Model
{
	protected $table = 'clients';
	protected $primaryKey = 'ClientID';
	public $timestamps = false;

	protected $fillable = [
		'NomClient',
		'Adresse',
		'Telephone',
		'Email'
	];

	public function commande_ventes()
	{
		return $this->hasMany(CommandeVente::class, 'ClientID');
	}
}
