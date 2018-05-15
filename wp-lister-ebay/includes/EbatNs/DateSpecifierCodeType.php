<?php
/* Generated on 14.02.18 14:28 by globalsync
 * $Id: $
 * $Log: $
 */

require_once 'EbatNs_FacetType.php';

class DateSpecifierCodeType extends EbatNs_FacetType
{
	const CodeType_M = 'M';
	const CodeType_D = 'D';
	const CodeType_Y = 'Y';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 **/
	function __construct()
	{
		parent::__construct('DateSpecifierCodeType', 'urn:ebay:apis:eBLBaseComponents');
	}
}
$Facet_DateSpecifierCodeType = new DateSpecifierCodeType();
?>