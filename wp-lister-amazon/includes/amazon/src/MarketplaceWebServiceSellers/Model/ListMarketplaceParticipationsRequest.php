<?php
/** 
 *  PHP Version 5
 *
 *  @category    Amazon
 *  @package     MarketplaceWebServiceSellers
 *  @copyright   Copyright 2008-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *  @link        http://aws.amazon.com
 *  @license     http://aws.amazon.com/apache2.0  Apache License, Version 2.0
 *  @version     2011-07-01
 */
/******************************************************************************* 
 * 
 *  Marketplace Web Service Sellers PHP5 Library
 * 
 */

/**
 *  @see MarketplaceWebServiceSellers_Model
 */
require_once ('MarketplaceWebServiceSellers/Model.php');  

    

/**
 * MarketplaceWebServiceSellers_Model_ListMarketplaceParticipationsRequest
 * 
 * Properties:
 * <ul>
 * 
 * <li>SellerId: string</li>
 *
 * </ul>
 */ 
class MarketplaceWebServiceSellers_Model_ListMarketplaceParticipationsRequest extends MarketplaceWebServiceSellers_Model
{

    /**
     * Construct new MarketplaceWebServiceSellers_Model_ListMarketplaceParticipationsRequest
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>SellerId: string</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'SellerId' => array('FieldValue' => null, 'FieldType' => 'string'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the SellerId property.
     * 
     * @return string SellerId
     */
    public function getSellerId() 
    {
        return $this->_fields['SellerId']['FieldValue'];
    }

    /**
     * Sets the value of the SellerId property.
     * 
     * @param string SellerId
     * @return this instance
     */
    public function setSellerId($value) 
    {
        $this->_fields['SellerId']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the SellerId and returns this instance
     * 
     * @param string $value SellerId
     * @return MarketplaceWebServiceSellers_Model_ListMarketplaceParticipationsRequest instance
     */
    public function withSellerId($value)
    {
        $this->setSellerId($value);
        return $this;
    }


    /**
     * Checks if SellerId is set
     * 
     * @return bool true if SellerId  is set
     */
    public function isSetSellerId()
    {
        return !is_null($this->_fields['SellerId']['FieldValue']);
    }




}