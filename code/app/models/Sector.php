<?php

/**
 * Sector
 *
 * @property integer $id_sector 
 * @property string $descripcion_sector 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cliente[] $clientes 
 * @property-read \Illuminate\Database\Eloquent\Collection|\Encuesta[] $encuestas 
 * @method static \Illuminate\Database\Query\Builder|\Sector whereIdSector($value)
 * @method static \Illuminate\Database\Query\Builder|\Sector whereDescripcionSector($value)
 * @method static \Illuminate\Database\Query\Builder|\Sector whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Sector whereUpdatedAt($value)
 */
class Sector extends \Eloquent
{

	protected     $table      = 'sector';
	protected     $primaryKey = 'id_sector';
	public static $rules      = array(// 'title'            => 'required'
	);
	protected     $fillable   = array('descripcion_sector');

	public function clientes()
	{
		return $this->hasMany('Cliente', 'id_sector');
	}

	public function encuestas()
	{
		return $this->belongsToMany('Encuesta', 'encuesta_sector', 'id_sector', 'id_encuesta');
	}
}