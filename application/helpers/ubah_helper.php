<?php

function ubah($isi){
	$cari_gambar = preg_replace('/(https?:\/\/\S+(?:jpg|jpeg|png|gif))/i', '<img src="$1">', $isi);
	return $cari_gambar;
}