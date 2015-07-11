<?php

class ShortenController extends BaseController
{
	public function __construct()
	{
		$this->beforeFilter('csrf');
	}

	public function index()
	{
		$clients = Cliente::where('id_cliente', '!=', Config::get('default.idcliente'))->lists('nombre_cliente', 'id_cliente');
		$canals  = Canal::lists('descripcion_canal', 'codigo_canal');

		return View::make('shorturl.home')->withClients($clients)->withCanals($canals);
	}

	public function getShorten($given = null)
	{
		if (!isset($given)) {
			return Redirect::to('survey/error');
		}

		$row = Url::whereGiven($given)->first();

		if (!isset($row) && !$row->exists) {
			return Redirect::to('survey/error');
		}

		return Redirect::to($row->url);
	}

	public function postShorten()
	{
		$url   = Input::get('url', null);
		$rules = array('url' => 'required|url');

		if (!isset($url) || $url == '') {
			$url   = url('/survey', array(Crypt::encrypt(Input::get('client', null)), Crypt::encrypt(Input::get('canal', null))));
			$rules = array('client' => 'required|integer', 'canal' => 'required|min:2');
		}

		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::to('shorten/generate')->withErrors($validator)->withInput(Input::except('_token'));
		}

		$record = Url::whereUrl($url)->first();

		if (isset($record) && $record->exists) {
			$url = url('/', array($record->given));

			return View::make('shorturl.result')->with('url', $url);
		}

		$data        = new Url;
		$data->url   = $url;
		$data->given = Url::getShortenedUrl();
		//$data->params = implode('|', Input::except('_token'));

		if ($data->save()) {
			$row = Url::whereUrl($url)->first();
			$url = url('/', array($row->given));

			return View::make('shorturl.result')->with('url', $url);
		}
	}
}