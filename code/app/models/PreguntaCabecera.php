<?php

/**
 * PreguntaCabecera
 *
 * @property integer $id_pregunta_cabecera 
 * @property string $descripcion_1 
 * @property string $descripcion_2 
 * @property string $descripcion_3 
 * @property string $numero_pregunta 
 * @property integer $id_pregunta_padre 
 * @property integer $id_encuesta 
 * @property integer $id_categoria 
 * @property integer $id_tipo_respuesta 
 * @property integer $id_estado 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \Encuesta $encuesta 
 * @method static \Illuminate\Database\Query\Builder|\PreguntaCabecera whereIdPreguntaCabecera($value)
 * @method static \Illuminate\Database\Query\Builder|\PreguntaCabecera whereDescripcion1($value)
 * @method static \Illuminate\Database\Query\Builder|\PreguntaCabecera whereDescripcion2($value)
 * @method static \Illuminate\Database\Query\Builder|\PreguntaCabecera whereDescripcion3($value)
 * @method static \Illuminate\Database\Query\Builder|\PreguntaCabecera whereNumeroPregunta($value)
 * @method static \Illuminate\Database\Query\Builder|\PreguntaCabecera whereIdPreguntaPadre($value)
 * @method static \Illuminate\Database\Query\Builder|\PreguntaCabecera whereIdEncuesta($value)
 * @method static \Illuminate\Database\Query\Builder|\PreguntaCabecera whereIdCategoria($value)
 * @method static \Illuminate\Database\Query\Builder|\PreguntaCabecera whereIdTipoRespuesta($value)
 * @method static \Illuminate\Database\Query\Builder|\PreguntaCabecera whereIdEstado($value)
 * @method static \Illuminate\Database\Query\Builder|\PreguntaCabecera whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\PreguntaCabecera whereUpdatedAt($value)
 */
class PreguntaCabecera extends \Eloquent
{

	public static $rules      = array('descripcion_1'     => 'required',
	                                  'descripcion_2'     => 'required',
	                                  'descripcion_3'     => 'required',
	                                  'numero_pregunta'   => 'required',
	                                  'id_pregunta_padre' => 'required',
	                                  'id_tipo_respuesta' => 'required',
	                                  'id_estado'         => 'required',
	                                  'id_encuesta'       => 'required');
	protected     $table      = 'pregunta_cabecera';
	protected     $primaryKey = 'id_pregunta_cabecera';
	protected     $fillable   = array('descripcion_1',
	                                  'descripcion_2',
	                                  'descripcion_3',
	                                  'numero_pregunta',
	                                  'id_pregunta_padre',
	                                  'id_tipo_respuesta',
	                                  'id_estado',
	                                  'id_encuesta');

	/**
	 * @param \Encuesta $survey
	 */
	public static function generateDefaultQuestions(Encuesta $survey)
	{
		$question1 = static::create(['descripcion_1' => 'Pregunta de Efectividad', 'numero_pregunta' => 1, 'id_tipo_respuesta' => 1, 'id_estado' => 1, 'id_momento' => 1]);
		$question1 = $survey->preguntas()->save($question1);

		$subquestion1 = static::create(['descripcion_1'     => '�Por qu� califica con esa nota? (opcional)',
		                                'id_pregunta_padre' => $question1->id_pregunta_cabecera,
		                                'id_tipo_respuesta' => 5,
		                                'id_estado'         => 1,
		                                'id_momento'        => 1]);
		$survey->preguntas()->save($subquestion1);

		$question2 = static::create(['descripcion_1' => 'Pregunta de Facilidad', 'numero_pregunta' => 2, 'id_tipo_respuesta' => 1, 'id_estado' => 1, 'id_momento' => 2]);
		$question2 = $survey->preguntas()->save($question2);

		$subquestion2 = static::create(['descripcion_1'     => '�Por qu� califica con esa nota? (opcional)',
		                                'id_pregunta_padre' => $question2->id_pregunta_cabecera,
		                                'id_tipo_respuesta' => 5,
		                                'id_estado'         => 1,
		                                'id_momento'        => 2]);
		$survey->preguntas()->save($subquestion2);

		$question3 = static::create(['descripcion_1' => ' Pregunta de lo Grato de la interacci�n', 'numero_pregunta' => 3, 'id_tipo_respuesta' => 1, 'id_momento' => 3]);
		$question3 = $survey->preguntas()->save($question3);

		$subquestion3 = static::create(['descripcion_1'     => '�Por qu� califica con esa nota? (opcional)',
		                                'id_pregunta_padre' => $question3->id_pregunta_cabecera,
		                                'id_tipo_respuesta' => 5,
		                                'id_estado'         => 1,
		                                'id_momento'        => 3]);
		$survey->preguntas()->save($subquestion3);

		$question4 = static::create(['descripcion_1'     => '�Recomendar�a nuestra empresa a sus amigos/conocidos?',
		                             'numero_pregunta'   => 4,
		                             'id_tipo_respuesta' => 6,
		                             'id_estado'         => 1,
		                             'id_momento'        => 4]);
		$survey->preguntas()->save($question4);
	}

	public function encuesta()
	{
		return $this->belongsTo('Encuesta', 'id_encuesta');
	}
}

	