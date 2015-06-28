<?php
class Loader {
	public function load($file, $data = array()) {
		extract($data);

		ob_start();

		require('/templates/' . $file);

		$output = ob_get_contents();

		ob_end_clean();

		return $output;
	}
}
?>