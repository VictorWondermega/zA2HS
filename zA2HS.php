<?php
// version: 1
namespace za\zA2HS;

// ザガタ。六 /////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////

class zA2HS {
	/* Zagata.Add to Homescreen */

	///////////////////////////////
	// funcs

	/////////////////////////////// 
	public function tmplts() {
		$vrs = $this->za->mm('vrs')[0];
		$vis = $this->za->mm('vis');
		if($vis) {

			$vis[0]['page']['hdr']['js'][] = '/'.$this->bs.'/zA2HS/zA2HS.js';
			
			if(isset($vrs['serviceWorker.js'])) { 
				header('content-type:application/javascript');
				$re = file_get_contents($this->cd.$this->dd.'zA2HS'.$this->dd.'serviceWorker.js');
				$re = str_replace('zagata',$vrs['host'],$re);
				exit($re);
			} else {			
				// $vis[0]['page']['hdr']['A2HS'] = array();
			}
			$this->za->mm('vis',$vis[0]);
		} else { }
	}

	/////////////////////////////// 
	// ini
	function __construct($za,$a=false,$n=false) {
		$this->za = $za;
		$this->n = (($n)?$n:'zA2HS');
		// $this->za->msg('dbg','zA2HS','i am '.$this->n.'(zA2HS)');

		$this->cd = realpath( __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR );
		$this->dd = DIRECTORY_SEPARATOR;
		$this->bs = explode($this->dd,$this->cd); $this->bs = end($this->bs);

// exit($this->za->cd);

		$tmp = $za->mm(array('vrs','sys'));
		$tmp['url']['serviceWorker.js'] = 0;
		$za->mm(array('vrs','sys'),$tmp);

		$za->ee('vis',array($this,'tmplts'));

	}
}

// ザガタ。六 /////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////

if(class_exists('\zlo')) {
	\zlo::da('zA2HS');
} elseif(realpath(__FILE__) == realpath($_SERVER['DOCUMENT_ROOT'].$_SERVER['SCRIPT_NAME'])) {
	header("content-type: text/plain;charset=utf-8");
	exit('zA2HS');
} else {}

?>