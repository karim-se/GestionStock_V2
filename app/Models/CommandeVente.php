<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CommandeVente
 * 
 * @property int $CommandeVenteID
 * @property Carbon $DateCommande
 * @property int $ClientID
 * @property int $etatID
 * 
 * @property Client $client
 * @property Etat $etat
 * @property Collection|Detailcommandevente[] $detailcommandeventes
 *
 * @package App\Models
 */
class CommandeVente extends Model
{
	protected $table = 'commandeVentes';
	protected $primaryKey = 'CommandeVenteID';
	public $timestamps = false;

	protected $casts = [
		'DateCommande' => 'datetime',
		'ClientID' => 'int',
		'etatID' => 'int'
	];

	protected $fillable = [
		'DateCommande',
		'ClientID',
		'etatID'
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'ClientID');
	}

	public function etat()
	{
		return $this->belongsTo(Etat::class, 'etatID');
	}

	public function detailcommandeventes()
	{
		return $this->hasMany(Detailcommandevente::class, 'CommandeVenteID');
	}
}
