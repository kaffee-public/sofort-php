<?php
namespace kaffee\cache;

/**
 * .
 * @author ahorvath
 */
class JpegCache extends FileCache {
	private static $JPEG_ENDING = 'jpeg';
	//
	private $quality = 75;
	//
	public function JpegCache($cacheDir, $quality) {
		$this->FileCache($cacheDir);
		$this->quality = $quality;
	}
	public function fetch($id) {
		if (!file_exists($this->cacheDir . self::getHash($id) . self::$JPEG_ENDING)) {
			return null;
		}
		return file_get_contents($this->cacheDir . self::getHash($id) . self::$JPEG_ENDING);
	}
	private static function getHash($id) {
		return md5($id);
	}
	/**
	 * @param string $id
	 * @param resource $image
	 */
	public function store($id, $image) {
		imagejpeg($image, $this->cacheDir . self::getHash($id) . self::$JPEG_ENDING, $this->quality);
	}
	public function remove($id) {
		$path = $this->cacheDir . self::getHash($id) . self::$JPEG_ENDING;
		if (file_exists($path)) {
			unlink($path);
		}
	}
}
