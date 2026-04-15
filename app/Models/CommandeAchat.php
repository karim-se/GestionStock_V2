<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CommandeAchat
 * 
 * @property int $CommandeAchatID
 * @property Carbon $DateCommande
 * @property int $FournisseurID
 * @property int $etatID
 * 
 * @property Etat $etat
 * @property Fournisseur $fournisseur
 * @property Collection|Detailcommandeachat[] $detailcommandeachats
 *
 * @package App\Models
 */
class CommandeAchat extends Model
{
	protected $table = 'commandeAchats';
	protected $primaryKey = 'CommandeAchatID';
	public $timestamps = false;

	protected $casts = [
		'DateCommande' => 'datetime',
		'FournisseurID' => 'int',
		'etatID' => 'int'
	];

	protected $fillable = [
		'DateCommande',
		'FournisseurID',
		'etatID'
	];

	public function etat()
	{
		return $this->belongsTo(Etat::class, 'etatID');
	}

	public function fournisseur()
	{
		return $this->belongsTo(Fournisseur::class, 'FournisseurID');
	}

	public function detailcommandeachats()
	{
		return $this->hasMany(Detailcommandeachat::class ,'CommandeAchatID');
	}
}
