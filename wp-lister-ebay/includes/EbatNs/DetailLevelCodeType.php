<?php
/* Generated on 14.02.18 14:28 by globalsync
 * $Id: $
 * $Log: $
 */

require_once 'EbatNs_FacetType.php';

class DetailLevelCodeType extends EbatNs_FacetType
{
	const CodeType_ReturnAll = 'ReturnAll';
	const CodeType_ItemReturnDescription = 'ItemReturnDescription';
	const CodeType_ItemReturnAttributes = 'ItemReturnAttributes';
	const CodeType_ItemReturnCategories = 'ItemReturnCategories';
	const CodeType_ReturnSummary = 'ReturnSummary';
	const CodeType_ReturnHeaders = 'ReturnHeaders';
	const CodeType_ReturnMessages = 'ReturnMessages';

	/**
	 * @return 
	 **/
	function __construct()
	{
		parent::__construct('DetailLevelCodeType', 'urn:ebay:apis:eBLBaseComponents');
	}
}
$Facet_DetailLevelCodeType = new DetailLevelCodeType();
?>