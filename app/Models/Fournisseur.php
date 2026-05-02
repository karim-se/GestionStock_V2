<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Fournisseur
 *
 * @property int $FournisseurID
 * @property string $NomFournisseur
 * @property string|null $Adresse
 * @property string|null $Telephone
 * @property string|null $Email
 * @property string|null $Role
 *
 * @property Collection|CommandeAchat[] $commande_achats
 *
 * @package App\Models
 */
class Fournisseur extends Model
{
    protected $table = 'fournisseurs';
    protected $primaryKey = 'FournisseurID';
    public $timestamps = false;

    protected $fillable = [
        'NomFournisseur',
        'Adresse',
        'Telephone',
        'Email',
        'Role'
    ];

    public function commande_achats()
    {
        return $this->hasMany(CommandeAchat::class, 'FournisseurID');
    }
}
