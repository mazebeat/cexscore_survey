<?php

/**
 * Canal
 *
 * @property integer $id_canal 
 * @property string $codigo_canal 
 * @property string $descripcion_canal 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @method static \Illuminate\Database\Query\Builder|\Canal whereIdCanal($value)
 * @method static \Illuminate\Database\Query\Builder|\Canal whereCodigoCanal($value)
 * @method static \Illuminate\Database\Query\Builder|\Canal whereDescripcionCanal($value)
 * @method static \Illuminate\Database\Query\Builder|\Canal whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Canal whereUpdatedAt($value)
 */
class Canal extends \Eloquent
{
	protected $table      = 'canal';
	protected $primaryKey = 'id_canal';
	protected $fillable   = array('codigo_canal', 'descripcion_canal');

}