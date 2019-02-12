<?php
/**
 * Complex components with chunks for Bootstrap components.
 * Original: https://github.com/bpstr/components-php
 * @bpstr Project Lifera <bpstr@gmx.tm>
 *
 * @see class.card.php
 * @see class.carousel.php
 * @see class.modal.php
 */

trait Complex  {

	public function enfoldChunk ($content) {
		$class = (isset($this->chunk_name)) ? $this->chunk_name : ($this->family ?? $this->tag)."-chunk";
		$chunk = Element::div($content)->addClass($class);
		return $chunk;
	}

	// Content passed in level 2 arrays will be wrapped in one chunk
	public function addChunks($list) {
		if (empty($list)) return $this;
		if (is_array($list)) {
			foreach($list as $key => $chunk) {
				if (is_numeric($key)) $key = Bootstrap::sprefix("chunk", $key);
				$this->addChunk($key, $chunk);
			}
		} else {
			$this->addChunk(NULL, $list);
		}

		return $this;
	}

	public function prepareChunkItem ($item) {
		return $item;
	}

	public function addChunk ($key, $item) {
		$chunk = (is_array($item)) ? array_map(array($this, 'prepareChunkItem'), $item) : $this->enfoldChunk($item);
		if (is_numeric($key)) $key = Bootstrap::sprefix("chunk", $key);
		$this->addContent($chunk, $key);
		return $this;
	}

	public function activeChunk ($key, $chunk) {
		if (is_null($key) && !empty($this->contents[$chunk])) $key = array_shift(array_keys($this->contents[$chunk]));
		if (isset($this->contents[$chunk][$key]) && $this->contents[$chunk][$key] instanceof Element) {
			$this->contents[$chunk][$key]->addClass(Bootstrap::CLASS_ACTIVE);
		}

		return $this;
	}
}

?>
