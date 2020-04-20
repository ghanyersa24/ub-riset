<?php
defined('BASEPATH') or exit('No direct script access allowed');

function r($value)
{
	$search = array("'", '"');
	$replace = array(" ");
	if (is_null($value)) {
		return "";
	}
	return str_replace($search, $replace, $value);
}

// --------------- helper tanggal

function tgl($tgl)
{
	$check = strtotime($tgl);
	if ($check != false) {
		if ($check > strtotime(date("Y-m-d H:i:s")))
			return date("Y-m-d H:i", strtotime($tgl));
		else {
			error("tanggal sudah tidak bisa dipilih");
		}
	} else
		error("tanggal tidak sesuai dengan ketentuan");
}

// --------------- helper inputan

function post($key)
{
	if (isset($_POST[$key])) {
		return strip_tags(r($_POST[$key]));
	} else {
		error("data input $key kosong");
	}
}

function post_null($key)
{
	if (isset($_POST[$key])) {
		return strip_tags($_POST[$key]);
	} else {
		return "";
	}
}

// --------------- helper message json
function success($msg, $data)
{
	header('Content-Type: application/json');
	echo json_encode(
		array(
			"error" => false,
			"message" => $msg,
			"data" => $data
		)
	);
	exit;
}

function error($msg)
{
	header('Content-Type: application/json');
	echo json_encode(
		array(
			"error" => true,
			"message" => $msg,
			"data" => []
		)
	);
	exit;
}

// --------------- helper model
function true($data)
{
	return (object) array(
		"error" => false,
		"data" => $data
	);
}

function false()
{
	return (object) array(
		"error" => true
	);
}

// --------------- helper url
function api($url)
{
	echo "http://localhost/service/$url";
}
