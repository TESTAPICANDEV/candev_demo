<?php
/**
 * This file is part of FPDI
 *
 * @package   FPDI
 * @copyright Copyright (c) 2015 Setasign - Jan Slabon (http://www.setasign.com)
 * @license   http://opensource.org/licenses/mit-license The MIT License
 * @version   1.6.1
 */
/**
* PLEASE NOTE THAT THIS FILE IS PROCESSED PROGRAMMATICALLY FOR THE itbz\fpdi
* RELEASE BUG REPORTS AND SUGGESTED CHANGES SHOULD BE DIRECTED TO SETASIGN
* DIRECTLY BUGS RELATED TO THIS CONVERSION CAN BE REPORTED AT
* https://github.com/hanneskod/fpdi/issues
*/
namespace fpdi {
    if (!class_exists('fpdi_bridge')) {
    }
    class FPDF_TPL extends \fpdi\fpdi_bridge
    {
        protected $_tpls = array();
        public $tpl = 0;
        protected $_inTpl = false;
        public $tplPrefix = '/TPL';
        protected $_res = array();
        public $lastUsedTemplateData = array();
        public function beginTemplate($x = null, $y = null, $w = null, $h = null)
        {
            if (is_subclass_of($this, '\\TCPDF')) {
                throw new \LogicException('This method is only usable with FPDF. Use TCPDF methods startTemplate() instead.');
            }
            if ($this->page <= 0) {
                throw new \LogicException('You have to add at least a page first!');
            }
            if ($x == null) {
                $x = 0;
            }
            if ($y == null) {
                $y = 0;
            }
            if ($w == null) {
                $w = $this->w;
            }
            if ($h == null) {
                $h = $this->h;
            }
            $this->tpl++;
            $tpl =& $this->_tpls[$this->tpl];
            $tpl = array('o_x' => $this->x, 'o_y' => $this->y, 'o_AutoPageBreak' => $this->AutoPageBreak, 'o_bMargin' => $this->bMargin, 'o_tMargin' => $this->tMargin, 'o_lMargin' => $this->lMargin, 'o_rMargin' => $this->rMargin, 'o_h' => $this->h, 'o_w' => $this->w, 'o_FontFamily' => $this->FontFamily, 'o_FontStyle' => $this->FontStyle, 'o_FontSizePt' => $this->FontSizePt, 'o_FontSize' => $this->FontSize, 'buffer' => '', 'x' => $x, 'y' => $y, 'w' => $w, 'h' => $h);
            $this->SetAutoPageBreak(false);
            $this->h = $h;
            $this->w = $w;
            $this->_inTpl = true;
            $this->SetXY($x + $this->lMargin, $y + $this->tMargin);
            $this->SetRightMargin($this->w - $w + $this->rMargin);
            if ($this->CurrentFont) {
                $fontKey = $this->FontFamily . $this->FontStyle;
                if ($fontKey) {
                    $this->_res['tpl'][$this->tpl]['fonts'][$fontKey] =& $this->fonts[$fontKey];
                    $this->_out(sprintf('BT /F%d %.2F Tf ET', $this->CurrentFont['i'], $this->FontSizePt));
                }
            }
            return $this->tpl;
        }
        public function endTemplate()
        {
            if (is_subclass_of($this, '\\TCPDF')) {
                $args = func_get_args();
                return call_user_func_array(array($this, '\\TCPDF::endTemplate'), $args);
            }
            if ($this->_inTpl) {
                $this->_inTpl = false;
                $tpl = $this->_tpls[$this->tpl];
                $this->SetXY($tpl['o_x'], $tpl['o_y']);
                $this->tMargin = $tpl['o_tMargin'];
                $this->lMargin = $tpl['o_lMargin'];
                $this->rMargin = $tpl['o_rMargin'];
                $this->h = $tpl['o_h'];
                $this->w = $tpl['o_w'];
                $this->SetAutoPageBreak($tpl['o_AutoPageBreak'], $tpl['o_bMargin']);
                $this->FontFamily = $tpl['o_FontFamily'];
                $this->FontStyle = $tpl['o_FontStyle'];
                $this->FontSizePt = $tpl['o_FontSizePt'];
                $this->FontSize = $tpl['o_FontSize'];
                $fontKey = $this->FontFamily . $this->FontStyle;
                if ($fontKey) {
                    $this->CurrentFont =& $this->fonts[$fontKey];
                }
                return $this->tpl;
            } else {
                return false;
            }
        }
        public function useTemplate($tplIdx, $x = null, $y = null, $w = 0, $h = 0)
        {
            if ($this->page <= 0) {
                throw new \LogicException('You have to add at least a page first!');
            }
            if (!isset($this->_tpls[$tplIdx])) {
                throw new \InvalidArgumentException('Template does not exist!');
            }
            if ($this->_inTpl) {
                $this->_res['tpl'][$this->tpl]['tpls'][$tplIdx] =& $this->_tpls[$tplIdx];
            }
            $tpl = $this->_tpls[$tplIdx];
            $_w = $tpl['w'];
            $_h = $tpl['h'];
            if ($x == null) {
                $x = 0;
            }
            if ($y == null) {
                $y = 0;
            }
            $x += $tpl['x'];
            $y += $tpl['y'];
            $wh = $this->getTemplateSize($tplIdx, $w, $h);
            $w = $wh['w'];
            $h = $wh['h'];
            $tplData = array('x' => $this->x, 'y' => $this->y, 'w' => $w, 'h' => $h, 'scaleX' => $w / $_w, 'scaleY' => $h / $_h, 'tx' => $x, 'ty' => $this->h - $y - $h, 'lty' => $this->h - $y - $h - ($this->h - $_h) * ($h / $_h));
            $this->_out(sprintf('q %.4F 0 0 %.4F %.4F %.4F cm', $tplData['scaleX'], $tplData['scaleY'], $tplData['tx'] * $this->k, $tplData['ty'] * $this->k));
            $this->_out(sprintf('%s%d Do Q', $this->tplPrefix, $tplIdx));
            $this->lastUsedTemplateData = $tplData;
            return array('w' => $w, 'h' => $h);
        }
        public function getTemplateSize($tplIdx, $w = 0, $h = 0)
        {
            if (!isset($this->_tpls[$tplIdx])) {
                return false;
            }
            $tpl = $this->_tpls[$tplIdx];
            $_w = $tpl['w'];
            $_h = $tpl['h'];
            if ($w == 0 && $h == 0) {
                $w = $_w;
                $h = $_h;
            }
            if ($w == 0) {
                $w = $h * $_w / $_h;
            }
            if ($h == 0) {
                $h = $w * $_h / $_w;
            }
            return array('w' => $w, 'h' => $h);
        }
        public function SetFont($family, $style = '', $size = null, $fontfile = '', $subset = 'default', $out = true)
        {
            if (is_subclass_of($this, '\\TCPDF')) {
                $args = func_get_args();
                return call_user_func_array(array($this, '\\TCPDF::SetFont'), $args);
            }
            parent::SetFont($family, $style, $size);
            $fontkey = $this->FontFamily . $this->FontStyle;
            if ($this->_inTpl) {
                $this->_res['tpl'][$this->tpl]['fonts'][$fontkey] =& $this->fonts[$fontkey];
            } else {
                $this->_res['page'][$this->page]['fonts'][$fontkey] =& $this->fonts[$fontkey];
            }
        }
        public function Image($file, $x = '', $y = '', $w = 0, $h = 0, $type = '', $link = '', $align = '', $resize = false, $dpi = 300, $palign = '', $ismask = false, $imgmask = false, $border = 0, $fitbox = false, $hidden = false, $fitonpage = false, $alt = false, $altimgs = array())
        {
            if (is_subclass_of($this, '\\TCPDF')) {
                $args = func_get_args();
                return call_user_func_array(array($this, '\\TCPDF::Image'), $args);
            }
            $ret = parent::Image($file, $x, $y, $w, $h, $type, $link);
            if ($this->_inTpl) {
                $this->_res['tpl'][$this->tpl]['images'][$file] =& $this->images[$file];
            } else {
                $this->_res['page'][$this->page]['images'][$file] =& $this->images[$file];
            }
            return $ret;
        }
        public function AddPage($orientation = '', $format = '', $rotationOrKeepmargins = false, $tocpage = false)
        {
            if (is_subclass_of($this, '\\TCPDF')) {
                $args = func_get_args();
                return call_user_func_array(array($this, '\\TCPDF::AddPage'), $args);
            }
            if ($this->_inTpl) {
                throw new \LogicException('Adding pages in templates is not possible!');
            }
            parent::AddPage($orientation, $format, $rotationOrKeepmargins);
        }
        public function Link($x, $y, $w, $h, $link, $spaces = 0)
        {
            if (is_subclass_of($this, '\\TCPDF')) {
                $args = func_get_args();
                return call_user_func_array(array($this, '\\TCPDF::Link'), $args);
            }
            if ($this->_inTpl) {
                throw new \LogicException('Using links in templates is not posible!');
            }
            parent::Link($x, $y, $w, $h, $link);
        }
        public function AddLink()
        {
            if (is_subclass_of($this, '\\TCPDF')) {
                $args = func_get_args();
                return call_user_func_array(array($this, '\\TCPDF::AddLink'), $args);
            }
            if ($this->_inTpl) {
                throw new \LogicException('Adding links in templates is not possible!');
            }
            return parent::AddLink();
        }
        public function SetLink($link, $y = 0, $page = -1)
        {
            if (is_subclass_of($this, '\\TCPDF')) {
                $args = func_get_args();
                return call_user_func_array(array($this, '\\TCPDF::SetLink'), $args);
            }
            if ($this->_inTpl) {
                throw new \LogicException('Setting links in templates is not possible!');
            }
            parent::SetLink($link, $y, $page);
        }
        protected function _putformxobjects()
        {
            $filter = $this->compress ? '/Filter /FlateDecode ' : '';
            reset($this->_tpls);
            foreach ($this->_tpls as $tplIdx => $tpl) {
                $this->_newobj();
                $this->_tpls[$tplIdx]['n'] = $this->n;
                $this->_out('<<' . $filter . '/Type /XObject');
                $this->_out('/Subtype /Form');
                $this->_out('/FormType 1');
                $this->_out(sprintf('/BBox [%.2F %.2F %.2F %.2F]', $tpl['x'] * $this->k, -$tpl['y'] * $this->k, ($tpl['w'] + $tpl['x']) * $this->k, ($tpl['h'] - $tpl['y']) * $this->k));
                if ($tpl['x'] != 0 || $tpl['y'] != 0) {
                    $this->_out(sprintf('/Matrix [1 0 0 1 %.5F %.5F]', -$tpl['x'] * $this->k * 2, $tpl['y'] * $this->k * 2));
                }
                $this->_out('/Resources ');
                $this->_out('<</ProcSet [/PDF /Text /ImageB /ImageC /ImageI]');
                if (isset($this->_res['tpl'][$tplIdx])) {
                    $res = $this->_res['tpl'][$tplIdx];
                    if (isset($res['fonts']) && count($res['fonts'])) {
                        $this->_out('/Font <<');
                        foreach ($res['fonts'] as $font) {
                            $this->_out('/F' . $font['i'] . ' ' . $font['n'] . ' 0 R');
                        }
                        $this->_out('>>');
                    }
                    if (isset($res['images']) || isset($res['tpls'])) {
                        $this->_out('/XObject <<');
                        if (isset($res['images'])) {
                            foreach ($res['images'] as $image) {
                                $this->_out('/I' . $image['i'] . ' ' . $image['n'] . ' 0 R');
                            }
                        }
                        if (isset($res['tpls'])) {
                            foreach ($res['tpls'] as $i => $_tpl) {
                                $this->_out($this->tplPrefix . $i . ' ' . $_tpl['n'] . ' 0 R');
                            }
                        }
                        $this->_out('>>');
                    }
                }
                $this->_out('>>');
                $buffer = $this->compress ? gzcompress($tpl['buffer']) : $tpl['buffer'];
                $this->_out('/Length ' . strlen($buffer) . ' >>');
                $this->_putstream($buffer);
                $this->_out('endobj');
            }
        }
        public function _putimages()
        {
            parent::_putimages();
            $this->_putformxobjects();
        }
        public function _putxobjectdict()
        {
            parent::_putxobjectdict();
            foreach ($this->_tpls as $tplIdx => $tpl) {
                $this->_out(sprintf('%s%d %d 0 R', $this->tplPrefix, $tplIdx, $tpl['n']));
            }
        }
        public function _out($s)
        {
            if ($this->state == 2 && $this->_inTpl) {
                $this->_tpls[$this->tpl]['buffer'] .= $s . '
';
            } else {
                parent::_out($s);
            }
        }
    }
} while(($n = key($this->_obj_stack[$filename])) !== null) {
                        $nObj = $this->current_parser->getObjectVal($this->_obj_stack[$filename][$n][1]);
                        $this->_newobj($this->_obj_stack[$filename][$n][0]);
                        if ($nObj[0] == PDF_TYPE_STREAM) {
							$this->pdf_write_value($nObj);
                        } else {
                            $this->pdf_write_value($nObj[1]);
                        }
                        $this->_out('endobj');
                        $this->_obj_stack[$filename][$n] = null; // free memory
                        unset($this->_obj_stack[$filename][$n]);
                        reset($this->_obj_stack[$filename]);
                    }
                }
                // We're done with this parser.  Clean it up to free a bit of RAM.
                $this->current_parser->cleanUp();
                unset($this->parsers[$filename]);
            }
        }
    }
    /**
     * Private Method that writes the form xobjects
     */
    function _putformxobjects() {
        $filter=($this->compress) ? '/Filter /FlateDecode ' : '';
	    reset($this->tpls);
        foreach($this->tpls AS $tplidx => $tpl) {
            $p=($this->compress) ? gzcompress($tpl['buffer']) : $tpl['buffer'];
    		$this->_newobj();
    		$cN = $this->n; // TCPDF/Protection: rem current "n"
    		$this->tpls[$tplidx]['n'] = $this->n;
    		$this->_out('<<' . $filter . '/Type /XObject');
            $this->_out('/Subtype /Form');
            $this->_out('/FormType 1');
            $this->_out(sprintf('/BBox [%.2F %.2F %.2F %.2F]',
                (isset($tpl['box']['llx']) ? $tpl['box']['llx'] : $tpl['x']) * $this->k,
                (isset($tpl['box']['lly']) ? $tpl['box']['lly'] : -$tpl['y']) * $this->k,
                (isset($tpl['box']['urx']) ? $tpl['box']['urx'] : $tpl['w'] + $tpl['x']) * $this->k,
                (isset($tpl['box']['ury']) ? $tpl['box']['ury'] : $tpl['h'] - $tpl['y']) * $this->k
            ));
            $c = 1;
            $s = 0;
            $tx = 0;
            $ty = 0;
            if (isset($tpl['box'])) {
                $tx = -$tpl['box']['llx'];
                $ty = -$tpl['box']['lly'];
                if ($tpl['_rotationAngle'] <> 0) {
                    $angle = $tpl['_rotationAngle'] * M_PI/180;
                    $c=cos($angle);
                    $s=sin($angle);
                    switch($tpl['_rotationAngle']) {
                        case -90:
                           $tx = -$tpl['box']['lly'];
                           $ty = $tpl['box']['urx'];
                           break;
                        case -180:
                            $tx = $tpl['box']['urx'];
                            $ty = $tpl['box']['ury'];
                            break;
                        case -270:
                        	$tx = $tpl['box']['ury'];
                            $ty = -$tpl['box']['llx'];
                            break;
                    }
                }
            } elseif ($tpl['x'] != 0 || $tpl['y'] != 0) {
                $tx = -$tpl['x'] * 2;
                $ty = $tpl['y'] * 2;
            }
            $tx *= $this->k;
            $ty *= $this->k;
            if ($c != 1 || $s != 0 || $tx != 0 || $ty != 0) {
                $this->_out(sprintf('/Matrix [%.5F %.5F %.5F %.5F %.5F %.5F]',
                    $c, $s, -$s, $c, $tx, $ty
                ));
            }
            $this->_out('/Resources ');
            if (isset($tpl['resources'])) {
                $this->current_parser =& $tpl['parser'];
                $this->pdf_write_value($tpl['resources']); // "n" will be changed
            } else {
                $this->_out('<</ProcSet [/PDF /Text /ImageB /ImageC /ImageI]');
            	if (isset($this->_res['tpl'][$tplidx]['fonts']) && count($this->_res['tpl'][$tplidx]['fonts'])) {
                	$this->_out('/Font <<');
                    foreach($this->_res['tpl'][$tplidx]['fonts'] as $font)
                		$this->_out('/F' . $font['i'] . ' ' . $font['n'] . ' 0 R');
                	$this->_out('>>');
                }
            	if(isset($this->_res['tpl'][$tplidx]['images']) && count($this->_res['tpl'][$tplidx]['images']) ||
            	   isset($this->_res['tpl'][$tplidx]['tpls']) && count($this->_res['tpl'][$tplidx]['tpls']))
            	{
                    $this->_out('/XObject <<');
                    if (isset($this->_res['tpl'][$tplidx]['images']) && count($this->_res['tpl'][$tplidx]['images'])) {
                        foreach($this->_res['tpl'][$tplidx]['images'] as $image)
                  			$this->_out('/I' . $image['i'] . ' ' . $image['n'] . ' 0 R');
                    }
                    if (isset($this->_res['tpl'][$tplidx]['tpls']) && count($this->_res['tpl'][$tplidx]['tpls'])) {
                        foreach($this->_res['tpl'][$tplidx]['tpls'] as $i => $tpl)
                            $this->_out($this->tplprefix . $i . ' ' . $tpl['n'] . ' 0 R');
                    }
                    $this->_out('>>');
            	}
            	$this->_out('>>');
            }
            $this->_out('/Group <</Type/Group/S/Transparency>>');
            $nN = $this->n; // TCPDF: rem new "n"
            $this->n = $cN; // TCPDF: reset to current "n"
        	$p = $this->_getrawstream($p);
        	$this->_out('/Length ' . strlen($p) . ' >>');
        	$this->_out("stream\n" . $p . "\nendstream");
    		$this->_out('endobj');
    		$this->n = $nN; // TCPDF: reset to new "n"
        }
        $this->_putimportedobjects();
    }
    /**
     * Rewritten to handle existing own defined objects
     */
    function _newobj($obj_id = false, $onlynewobj = false) {
        if (!$obj_id) {
            $obj_id = ++$this->n;
        }
        //Begin a new object
        if (!$onlynewobj) {
            $this->offsets[$obj_id] = $this->bufferlen;
            $this->_out($obj_id . ' 0 obj');
            $this->_current_obj_id = $obj_id; // for later use with encryption
        }
        return $obj_id;
    }
    /**
     * Writes a value
     * Needed to rebuild the source document
     *
     * @param mixed $value A PDF-Value. Structure of values see cases in this method
     */
    function pdf_write_value(&$value)
    {
        switch ($value[0]) {
            case PDF_TYPE_STRING:
                if ($this->encrypted) {
                    $value[1] = $this->_unescape($value[1]);
                    $value[1] = $this->_encrypt_data($this->_current_obj_id, $value[1]);
                    $value[1] = TCPDF_STATIC::_escape($value[1]);
                }
                break;
            case PDF_TYPE_STREAM:
                if ($this->encrypted) {
                    $value[2][1] = $this->_encrypt_data($this->_current_obj_id, $value[2][1]);
                    $value[1][1]['/Length'] = array(
                        PDF_TYPE_NUMERIC,
                        strlen($value[2][1])
                    );
                }
                break;
            case PDF_TYPE_HEX:
                if ($this->encrypted) {
                    $value[1] = $this->hex2str($value[1]);
                    $value[1] = $this->_encrypt_data($this->_current_obj_id, $value[1]);
                    // remake hexstring of encrypted string
                    $value[1] = $this->str2hex($value[1]);
                }
                break;
        }
        switch ($value[0]) {
            case PDF_TYPE_TOKEN:
                $this->_straightOut('/'.$value[1] . ' ');
                break;
            case PDF_TYPE_NUMERIC:
            case PDF_TYPE_REAL:
                if (is_float($value[1]) && $value[1] != 0) {
                    $this->_straightOut(rtrim(rtrim(sprintf('%F', $value[1]), '0'), '.') . ' ');
                } else {
                    $this->_straightOut($value[1] . ' ');
                }
                break;
            case PDF_TYPE_ARRAY:
                // An array. Output the proper
                // structure and move on.
                $this->_straightOut('[');
                for ($i = 0; $i < count($value[1]); $i++) {
                    $this->pdf_write_value($value[1][$i]);
                }
                $this->_out(']');
                break;
            case PDF_TYPE_DICTIONARY:
                // A dictionary.
                $this->_straightOut('<<');
                reset ($value[1]);
                while (list($k, $v) = each($value[1])) {
                    $this->_straightOut($k . ' ');
                    $this->pdf_write_value($v);
                }
                $this->_straightOut('>>');
                break;
            case PDF_TYPE_OBJREF:
                // An indirect object reference
                // Fill the object stack if needed
                $cpfn =& $this->current_parser->uniqueid;
                if (!isset($this->_don_obj_stack[$cpfn][$value[1]])) {
                    $this->_newobj(false, true);
                    $this->_obj_stack[$cpfn][$value[1]] = array($this->n, $value);
                    $this->_don_obj_stack[$cpfn][$value[1]] = array($this->n, $value); // Value is maybee obsolete!!!
                }
                $objid = $this->_don_obj_stack[$cpfn][$value[1]][0];
                $this->_out($objid . ' 0 R');
                break;
            case PDF_TYPE_STRING:
                // A string.
                $this->_straightOut('(' . $value[1] . ')');
                break;
            case PDF_TYPE_STREAM:
                // A stream. First, output the
                // stream dictionary, then the
                // stream data itself.
                $this->pdf_write_value($value[1]);
                $this->_out('stream');
                $this->_out($value[2][1]);
                $this->_out('endstream');
                break;
            case PDF_TYPE_HEX:
                $this->_straightOut('<' . $value[1] . '>');
                break;
            case PDF_TYPE_BOOLEAN:
                $this->_straightOut($value[1] ? 'true ' : 'false ');
                break;
            case PDF_TYPE_NULL:
                // The null object.
                $this->_straightOut('null ');
                break;
        }
    }
    /**
     * Modified so not each call will add a newline to the output.
     */
    function _straightOut($s) {
        if ($this->state == 2) {
			if ($this->inxobj) {
				// we are inside an XObject template
				$this->xobjects[$this->xobjid]['outdata'] .= $s;
			} elseif ((!$this->InFooter) AND isset($this->footerlen[$this->page]) AND ($this->footerlen[$this->page] > 0)) {
				// puts data before page footer
				$pagebuff = $this->getPageBuffer($this->page);
				$page = substr($pagebuff, 0, -$this->footerlen[$this->page]);
				$footer = substr($pagebuff, -$this->footerlen[$this->page]);
				$this->setPageBuffer($this->page, $page.$s.$footer);
				// update footer position
				$this->footerpos[$this->page] += strlen($s);
			} else {
				// set page data
				$this->setPageBuffer($this->page, $s, true);
			}
		} elseif ($this->state > 0) {
			// set general data
			$this->setBuffer($s);
		}
    }
    /**
     * rewritten to close opened parsers
     *
     */
    function _enddoc() {
        parent::_enddoc();
        $this->_closeParsers();
    }
    /**
     * close all files opened by parsers
     */
    function _closeParsers() {
        if ($this->state > 2 && count($this->parsers) > 0) {
          	$this->cleanUp();
            return true;
        }
        return false;
    }
    /**
     * Removes cylced references and closes the file handles of the parser objects
     */
    function cleanUp() {
    	foreach ($this->parsers as $k => $_){
        	$this->parsers[$k]->cleanUp();
        	$this->parsers[$k] = null;
        	unset($this->parsers[$k]);
        }
    }
    // Functions from here on are taken from FPDI's fpdi2tcpdf_bridge.php to remove dependence on it
    function _putstream($s, $n=0) {
        $this->_out($this->_getstream($s, $n));
    }
    function _getxobjectdict() {
        $out = parent::_getxobjectdict();
        if (count($this->tpls)) {
            foreach($this->tpls as $tplidx => $tpl) {
                $out .= sprintf('%s%d %d 0 R', $this->tplprefix, $tplidx, $tpl['n']);
            }
        }
        return $out;
    }
    /**
     * Unescapes a PDF string
     *
     * @param string $s
     * @return string
     */
    function _unescape($s) {
        $out = '';
        for ($count = 0, $n = strlen($s); $count < $n; $count++) {
            if ($s[$count] != '\\' || $count == $n-1) {
                $out .= $s[$count];
            } else {
                switch ($s[++$count]) {
                    case ')':
                    case '(':
                    case '\\':
                        $out .= $s[$count];
                        break;
                    case 'f':
                        $out .= chr(0x0C);
                        break;
                    case 'b':
                        $out .= chr(0x08);
                        break;
                    case 't':
                        $out .= chr(0x09);
                        break;
                    case 'r':
                        $out .= chr(0x0D);
                        break;
                    case 'n':
                        $out .= chr(0x0A);
                        break;
                    case "\r":
                        if ($count != $n-1 && $s[$count+1] == "\n")
                            $count++;
                        break;
                    case "\n":
                        break;
                    default:
                        // Octal-Values
                        if (ord($s[$count]) >= ord('0') &&
                            ord($s[$count]) <= ord('9')) {
                            $oct = ''. $s[$count];
                            if (ord($s[$count+1]) >= ord('0') &&
                                ord($s[$count+1]) <= ord('9')) {
                                $oct .= $s[++$count];
                                if (ord($s[$count+1]) >= ord('0') &&
                                    ord($s[$count+1]) <= ord('9')) {
                                    $oct .= $s[++$count];
                                }
                            }
                            $out .= chr(octdec($oct));
                        } else {
                            $out .= $s[$count];
                        }
                }
            }
        }
        return $out;
    }
    /**
     * Hexadecimal to string
     *
     * @param string $hex
     * @return string
     */
    function hex2str($hex) {
        return pack('H*', str_replace(array("\r", "\n", ' '), '', $hex));
    }
    /**
     * String to hexadecimal
     *
     * @param string $str
     * @return string
     */
    function str2hex($str) {
        return current(unpack('H*', $str));
    }
}