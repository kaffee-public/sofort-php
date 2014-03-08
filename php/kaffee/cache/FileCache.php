<?php
namespace kaffee\cache;

/**
 * .
 * @author ahorvath
 */
abstract class FileCache {
	protected $cacheDir = '';
	//
	public function FileCache($cacheDir) {
		$this->cacheDir = $cacheDir;
	}
	public abstract function fetch($id);
	public abstract function store($id, $file);
	public abstract function remove($id);
}
