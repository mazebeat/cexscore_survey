<?php

/**
 * Pais
 *
 * @property integer $id_pais 
 * @property string $descripcion_pais 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @method static \Illuminate\Database\Query\Builder|\Pais whereIdPais($value)
 * @method static \Illuminate\Database\Query\Builder|\Pais whereDescripcionPais($value)
 * @method static \Illuminate\Database\Query\Builder|\Pais whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pais whereUpdatedAt($value)
 */
class Pais extends \Eloquent
{

	protected     $table      = 'pais';
	protected     $primaryKey = 'id_pais';
	public static $rules      = array(// 'title'            => 'required'
	);
	protected     $fillable   = array('descripcion_pais');
}